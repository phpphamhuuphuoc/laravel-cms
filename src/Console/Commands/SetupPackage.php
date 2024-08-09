<?php

namespace PHPCorp\LaravelCms\Console\Commands;

use Illuminate\Console\Command;

class SetupPackage extends Command
{
    protected $signature = 'cms:setup';
    protected $description = 'Setup the Laravel CMS package';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->info('Publishing vendor assets...');
        \Artisan::call('vendor:publish', ['--tag' => 'laravel-cms-all', '--force' => true]);

        $this->info('Running migrations...');
        \Artisan::call('migrate');

        $this->info('Running seeder...');
        exec('php vendor/phpcorp/laravel-cms/run-seeder.php');

        $this->info('Installing npm packages...');
        exec('npm install');
        exec('npm update');
        exec('npm install vite --save-dev');

        $this->info('Building assets...');
        exec('npm run build');
        exec('npm run dev');

        $this->info('Starting development server...');
        \Artisan::call('serve');

        $this->info('Setup complete!');
    }
}
