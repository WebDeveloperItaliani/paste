<?php

namespace Wdi\Providers;

use Barryvdh\Debugbar\Facade as DebugbarFacade;
use Barryvdh\Debugbar\ServiceProvider as DebugbarServiceProvider;
use Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider;
use Faker\Factory as FakerFactory;
use Faker\Generator as FakerGenerator;
use Illuminate\Support\ServiceProvider;

final class DevEnvServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        if (in_array($this->app->environment(), ["local", "testing", "staging", "development", "dev"])) {
            $this->app->register(DebugbarServiceProvider::class);
            $this->app->register(IdeHelperServiceProvider::class);
            $this->app->alias("Debugbar", DebugbarFacade::class);

            $this->app->singleton(FakerGenerator::class, function () {
                return FakerFactory::create(config("app.locale_extended"));
            });
        }
    }
}
