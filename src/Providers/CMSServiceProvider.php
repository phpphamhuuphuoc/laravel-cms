<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\CMS\Page;
use Illuminate\Support\Facades\View;

class CMSServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(base_path('routes/web_cms.php'));
        View::share('globalData', [
            'menu' => Page::where('parent_id', NULL)->with('childrens')->orderBy('order')->get(),
        ]);
    }
}
