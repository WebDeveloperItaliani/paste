<?php

namespace Wdi\Providers;

use Illuminate\Support\ServiceProvider;
use Wdi\Entities\Paste;
use Wdi\Observers\PasteObserver;

/**
 * Class ObserverServiceProvider
 * @package Wdi\Providers
 */
final class ObserverServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Paste::observe(PasteObserver::class);
    }
}
