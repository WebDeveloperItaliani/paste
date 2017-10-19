<?php

namespace Wdi\Providers;


use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Route;

/**
 * Class RouteServiceProvider
 *
 * @package Wdi\Providers
 */
final class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator"s root namespace.
     *
     * @var string
     */
    protected $namespace = "Wdi\Http\Controllers";
    
    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //
        
        parent::boot();
    }
    
    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
        $this->mapWebRoutes();
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
        Route::prefix("api")->middleware("api")->namespace($this->namespace)->group(base_path("routes/api.php"));
    }
    
    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    private function mapWebRoutes()
    {
        Route::middleware("web")->namespace($this->namespace)->group(base_path("routes/web.php"));
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
