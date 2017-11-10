<?php

namespace Wdi\Http\Handlers;

use Illuminate\Http\Request;
use Socialite;

/**
 * Class SocialLoginHandler
 * @package Wdi\Http\Handlers
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
