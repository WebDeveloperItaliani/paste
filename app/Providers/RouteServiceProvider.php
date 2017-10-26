<?php

namespace Wdi\Providers;


use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Route;
use Wdi\Entities\Language;
use Wdi\Entities\Paste;

/**
 * Class RouteServiceProvider
 *
 * @package Wdi\Providers
 */
final class RouteServiceProvider extends ServiceProvider
{
    /** {@inheritdoc} */
    public function boot()
    {
        parent::boot();
    
        Route::model("paste", Paste::class);
        Route::model("language", Language::class);
    }
    
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapHandlerRoutes();
    }
    
    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    private function mapApiRoutes()
    {
        Route::prefix("api")->middleware("api")->group(base_path("routes/api.php"));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    private function mapHandlerRoutes()
    {
        Route::middleware("web")->group(base_path("routes/handler.php"));
    }
}
