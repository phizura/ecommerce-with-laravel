<?php

namespace App\Providers;

use App\Interfaces\Admin\AdminAuthInterface;
use App\Repositories\Admin\AdminAuthRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdminAuthInterface::class, AdminAuthRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
