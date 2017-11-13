<?php

namespace Wdi\Http\Handlers\Auth;

use Illuminate\Http\Request;
use Socialite;
use Wdi\Http\Handlers\Handler;
use Wdi\Http\Middleware\RedirectIfAuthenticated;

/**
 * Class SocialLoginHandler
 * @package Wdi\Http\Handlers\Auth
 */
final class SocialLoginHandler extends Handler
{
    /**
     * SocialLoginHandler constructor.
     */
    public function __construct()
    {
        $this->middleware(RedirectIfAuthenticated::class);
    }
    
    /**
     * @param \Illuminate\Http\Request $request
     * @param string $provider
     * @return mixed
     */
    public function __invoke(Request $request, $provider)
    {
        return Socialite::driver($provider)->redirect();
    }
}
