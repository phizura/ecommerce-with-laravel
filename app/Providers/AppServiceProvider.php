<?php

namespace App\Providers;

use App\Interfaces\Admin\AdminAuthInterface;
use App\Interfaces\Admin\CategoryInterface;
use App\Interfaces\Admin\TempImagesInterface;
use App\Repositories\Admin\AdminAuthRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\TempImagesRepository;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminAuthInterface::class, AdminAuthRepository::class);
        $this->app->bind(CategoryInterface::class, CategoryRepository::class);
        $this->app->bind(TempImagesInterface::class, TempImagesRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();
    }
}
