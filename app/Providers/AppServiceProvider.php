<?php

namespace Wdi\Providers;

use Schema;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        $this->setLocales();
    }

    private function setLocales()
    {
        config('app.localed_extended');

        setlocale(LC_TIME, config('app.localed_extended'));
        setlocale(LC_MONETARY, config('app.localed_extended'));
        Carbon::setLocale(config('app.localed_extended'));
    }
}
