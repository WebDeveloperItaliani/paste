<?php

namespace Wdi\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

/**
 * Class AuthServiceProvider
 *
 * @package Wdi\Providers
 */
final class AuthServiceProvider extends ServiceProvider
{
    /** {@inheritdoc} */
    protected $policies = [];
    
    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();
    }
}
