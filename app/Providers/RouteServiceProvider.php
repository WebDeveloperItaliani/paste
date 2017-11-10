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
    
        Route::model("language", Language::class);
        
        Route::bind("paste", function ($slug) {
            return Paste::select(["id", "language_id", "paste_id", "user_id", "slug", "name", "extension", "code", "description", "password", "created_at", "updated_at"])
                ->where("slug", $slug)->firstOrFail();
        });
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
        Route::prefix("api")->namespace("Wdi\Http\Api")->middleware("api")->group(base_path("routes/api.php"));
    }

    /**
     * Define the "handlers" routes for the application.
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
