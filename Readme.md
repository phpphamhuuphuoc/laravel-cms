# Install new laravel 10 or newest
composer create-project --prefer-dist laravel/laravel:^10.0 new-project
composer create-project --prefer-dist laravel/laravel new-project

# Install package
composer require phpcorp/laravel-cms

# Setup database local in .env file
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password

# Setup email in .env file
MAIL_MAILER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=phuocpham352@gmail.com
MAIL_PASSWORD="wcow gwvy vurl jdsr"
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS=phuocpham352@gmail.com
MAIL_FROM_NAME="${APP_NAME}"

# Setup APP_URL local in .env file
APP_URL=http://localhost:8000

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
