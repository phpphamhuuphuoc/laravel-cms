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

        $this->info('Install Breeze API & Sanctum...');
        \Artisan::call('breeze:install api');
        \Artisan::call('vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"');

        $this->info('Publishing vendor assets...');
        \Artisan::call('vendor:publish', ['--tag' => 'laravel-cms-all', '--force' => true]);

        $this->info('Running migrations...');
        \Artisan::call('migrate');

        $this->info('Running seeder...');
        exec('php vendor/phpcorp/laravel-cms/run-seeder.php');

        $this->info('Running config 3th library...');
        \Artisan::call('vendor:publish --tag=lfm_config');
        \Artisan::call('vendor:publish --tag=lfm_public');
        \Artisan::call('storage:link');

        $this->info('Installing npm packages...');
        exec('npm install');
        exec('npm update');
        exec('npm install vite --save-dev');

        // $this->info('Building assets...');
        // exec('npm run build');
        // exec('npm run dev');

        // $this->info('Starting development server...');
        // \Artisan::call('serve');

        $this->info('Setup complete!');
    }
}
