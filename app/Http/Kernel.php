<?php

namespace Wdi\Http;

use Illuminate\Auth\Middleware\{
    Authenticate, AuthenticateWithBasicAuth, Authorize
};
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Foundation\Http\Middleware\{
    CheckForMaintenanceMode, ConvertEmptyStringsToNull, ValidatePostSize
};
use Illuminate\Routing\Middleware\{
    SubstituteBindings, ThrottleRequests
};
use Illuminate\Session\Middleware\{
    AuthenticateSession, StartSession
};
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Wdi\Http\Middleware\{
    EncryptCookies, RedirectIfAuthenticated, TrimStrings, TrustProxies, VerifyCsrfToken
};

/**
 * Class Kernel
 *
 * @package Wdi\Http
 */
final class Kernel extends HttpKernel
{
    /** {@inheritdoc} */
    protected $middleware = [
        CheckForMaintenanceMode::class,
        ValidatePostSize::class,
        TrimStrings::class,
        ConvertEmptyStringsToNull::class,
    ];
    
    /** {@inheritdoc} */
    protected $middlewareGroups = [
        "web" => [
            EncryptCookies::class,
            AddQueuedCookiesToResponse::class,
            StartSession::class,
            AuthenticateSession::class,
            ShareErrorsFromSession::class,
            VerifyCsrfToken::class,
            SubstituteBindings::class,
        ],
        
        "api" => [
            "throttle:60,1",
            SubstituteBindings::class,
        ],
    ];
    
    /** {@inheritdoc} */
    protected $routeMiddleware = [
        "auth" => Authenticate::class,
        "auth.basic" => AuthenticateWithBasicAuth::class,
        "bindings" => SubstituteBindings::class,
        "can" => Authorize::class,
        "guest" => RedirectIfAuthenticated::class,
        "proxies" => TrustProxies::class,
        "throttle" => ThrottleRequests::class,
    ];
}
