# Install new laravel 10 or newest
composer create-project --prefer-dist laravel/laravel:^10.0 new-project
composer create-project --prefer-dist laravel/laravel new-project

# Install package
composer require phpcorp/laravel-cms

# Setup the Laravel CMS package
## Run command
php artisan cms:setup
## Build assets
npm run build
npm run dev
## Đăng ký CMS Service Provider ở thư mục bootstrap/app.php
App\Providers\CMSServiceProvider::class,
## Comment route '/' in routes\web.php
// Route::get('/', function () {
//     return view('welcome');
// });
## Cập nhật autoload files
composer dump-autoload

## Starting Serve
php artisan serve

# Follow URL CMS Admin
http://domain.com/cms/
http://127.0.0.1:8000/cms

# Create page home and follow URL end point for user
http://domain.com/
http://127.0.0.1:8000
