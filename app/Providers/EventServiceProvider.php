<?php

namespace Wdi\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

/**
 * Class EventServiceProvider
 *
 * @package Wdi\Providers
 */
final class EventServiceProvider extends ServiceProvider
{
    /** {@inheritdoc} */
    protected $listen = [];
    
    /** {@inheritdoc} */
    public function boot()
    {
        parent::boot();
    }
}
