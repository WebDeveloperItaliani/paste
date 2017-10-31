<?php

namespace Wdi\Providers;

use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Schema;

/**
 * Class AppServiceProvider
 *
 * @package Wdi\Providers
 */
final class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
    }
    
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        setlocale(LC_ALL, config("app.locale_extended"));
        Carbon::setLocale(config("app.locale"));
    }
}
