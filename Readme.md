# Install new laravel 10 or newest
composer create-project --prefer-dist laravel/laravel:^10.0 new-project
composer create-project --prefer-dist laravel/laravel new-project

# Install package
composer require phpcorp/laravel-cms

# Setup the Laravel CMS package
## Run command
php artisan cms:setup
## Định nghĩa các file Helpers vào file composer.json (object composer.json['autoload'])
"files": [
    "app/Helpers/CMS/Dispatch.php",
    "app/Helpers/CMS/File.php",
    "app/Helpers/CMS/Path.php",
    "app/Helpers/CMS/String.php"
]
## Cập nhật autoload files
composer dump-autoload
## Thêm các câu lệnh vào app\Providers\AppServiceProvider.php function boot()
use App\Models\CMS\Page;
use Illuminate\Support\Facades\View;
$this->loadRoutesFrom(base_path('routes/web_cms.php'));
View::share('globalData', [
    'menu' => Page::where('parent_id', NULL)->with('childrens')->orderBy('order')->get(),
]);
## Comment route '/' in routes\web.php
// Route::get('/', function () {
//     return view('welcome');
// });

# Follow URL CMS Admin
http://domain.com/cms/
http://127.0.0.1:8000/cms

# Create page home and follow URL end point for user
http://domain.com/
http://127.0.0.1:8000
