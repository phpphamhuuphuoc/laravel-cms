<?php

namespace PHPCorp\LaravelCms;

use Illuminate\Support\ServiceProvider;

class LaravelCmsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Register any package services here
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // Define an array with all publishable paths
        $publishablePaths = [
            'migrations' => [
                __DIR__.'/database/migrations/CMS' => database_path('migrations/CMS'),
            ],
            // 'seeders' => [
            //     __DIR__.'/database/seeders/CMS' => database_path('seeders/CMS'),
            // ],
            'helpers' => [
                __DIR__.'/Helpers/CMS' => base_path('app/Helpers/CMS'),
            ],
            'controllers_cms' => [
                __DIR__.'/Http/Controllers/CMS' => app_path('Http/Controllers/CMS'),
            ],
            'controllers_frontend' => [
                __DIR__.'/Http/Controllers/Frontend' => app_path('Http/Controllers/Frontend'),
            ],
            'mail' => [
                __DIR__.'/Mail/CMS' => base_path('app/Mail/CMS'),
            ],
            'models' => [
                __DIR__.'/Models/CMS' => app_path('Models/CMS'),
            ],
            'routes_sample' => [
                __DIR__.'/routes/Sample' => base_path('routes/Sample'),
            ],
            'routes_web_cms' => [
                __DIR__.'/routes/web_cms.php' => base_path('routes/web_cms.php'),
            ],
            'resources_cms' => [
                __DIR__.'/resources/cms' => resource_path('cms'),
            ],
            'views_cms' => [
                __DIR__.'/resources/views/cms' => resource_path('views/cms'),
            ],
            'views_frontend' => [
                __DIR__.'/resources/views/frontend' => resource_path('views/frontend'),
            ],
            'public_frontend' => [
                __DIR__ . '/public/frontend' => public_path('frontend'),
            ],
            'vue' => [
                __DIR__.'/vue.config.js' => base_path('vue.config.js'),
            ],
            'postcss' => [
                __DIR__.'/postcss.config.js' => base_path('postcss.config.js'),
            ],
            'tailwind' => [
                __DIR__.'/tailwind.config.js' => base_path('tailwind.config.js'),
            ],
            'vite' => [
                __DIR__.'/vite.config.js' => base_path('vite.config.js'),
            ],
            'package_json' => [
                __DIR__.'/package.json' => base_path('package.json'),
            ],
        ];
    
        // Publish each individual group
        foreach ($publishablePaths as $group => $paths) {
            $this->publishes($paths, "laravel-cms-$group");
        }
    
        // Combine all paths for a single publish command
        $allPaths = [];
        foreach ($publishablePaths as $paths) {
            $allPaths = array_merge($allPaths, $paths);
        }
    
        $this->publishes($allPaths, 'laravel-cms-all');
    
        // Load migrations
        $this->loadMigrationsFrom(__DIR__.'/database/migrations/CMS');

        // Load helpers
        $this->loadHelpers();
    }
    protected function loadHelpers()
    {
        // Đảm bảo rằng các file helper đã được publish vào thư mục dự án
        $helperPath = base_path('app/Helpers/CMS');

        // Lặp qua tất cả các file trong thư mục Helpers
        foreach (glob($helperPath . '/*.php') as $file) {
            if (file_exists($file)) {
                require_once $file;
            }
        }
    }
}