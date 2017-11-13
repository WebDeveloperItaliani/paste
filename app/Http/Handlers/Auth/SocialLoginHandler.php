<?php

namespace Wdi\Http\Handlers\Auth;

use Illuminate\Http\Request;
use Socialite;
use Wdi\Http\Handlers\Handler;

/**
 * Class SocialLoginHandler
 * @package Wdi\Http\Handlers\Auth
 */
final class SocialLoginHandler extends Handler
{
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
