# Publish migrations
php artisan vendor:publish --tag=laravel-cms-migrations

# Publish seeders
php artisan vendor:publish --tag=laravel-cms-seeders

# Publish helpers
php artisan vendor:publish --tag=laravel-cms-helpers

# Publish controllers
php artisan vendor:publish --tag=laravel-cms-controllers

# Publish mail classes
php artisan vendor:publish --tag=laravel-cms-mail

# Publish models
php artisan vendor:publish --tag=laravel-cms-models

# Publish routes
php artisan vendor:publish --tag=laravel-cms-routes

# Publish web CMS route file
php artisan vendor:publish --tag=laravel-cms-web-cms

# Publish CMS resources
php artisan vendor:publish --tag=laravel-cms-resources-cms

# Publish CMS views
php artisan vendor:publish --tag=laravel-cms-views-cms

# Publish frontend views
php artisan vendor:publish --tag=laravel-cms-views-frontend

# Publish asset view frontend
php artisan vendor:publish --tag=laravel-cms-asset-frontend

# Publish PostCSS config
php artisan vendor:publish --tag=laravel-cms-postcss

# Publish Tailwind config
php artisan vendor:publish --tag=laravel-cms-tailwind

# Publish Vite config - Nếu đã có file thì chạy câu lệnh 2
php artisan vendor:publish --tag=laravel-cms-vite 
php artisan vendor:publish --tag=laravel-cms-vite --force

# Publish Vue config
php artisan vendor:publish --tag=laravel-cms-vue

# Publish Package Json - Nếu đã có file thì chạy câu lệnh 2
php artisan vendor:publish --tag=laravel-cms-package-json
php artisan vendor:publish --tag=laravel-cms-package-json --force

# Thêm các câu lệnh vào AppServiceProviders
        $this->loadRoutesFrom(base_path('routes/web_cms.php'));
        View::share('globalData', [
            'menu' => Page::where('parent_id', NULL)->with('childrens')->get(),
        ]);

# Thêm các câu lệnh vào DatabaseSeeder
        $this->call([
            TemplateSeeder::class,
            CategoryTypeSeeder::class,
        ]);

# Comment route '/' in web.php
// Route::get('/', function () {
//     return view('welcome');
// });

# Install Vite Local
npm i 
npm update
npm install vite --save-dev
npm vite -v



# Migrate Database and Seeder
php artisan migrate
php artisan db:seed



# Run assets
npm run build
npm run dev

# Starting Serve
php artisan serve




