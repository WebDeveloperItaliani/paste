<?php

namespace Wdi\Http\Handlers;

use Illuminate\Http\Request;
use Socialite;
use Wdi\Entities\UserSocial;

/**
 * Class SocialRedirectHandler
 * @package Wdi\Http\Handlers
 */
final class SocialRedirectHandler extends Handler
{
    /**
     * @param \Illuminate\Http\Request $request
     * @param $provider
     */
    public function __invoke(Request $request, $provider)
    {
        $userFromSocial = Socialite::driver($provider)->user();
        
        UserSocial::firstOrCreate([
            "social_id" => $userFromSocial->getId(),
        ], [
            "oauth_token" => $userFromSocial->token,
            "oauth_secret" => $userFromSocial->secret,
            "oauth_refresh" => $userFromSocial->refreshToken,
            "expires_in" => $userFromSocial->expiresIn,
            "nickname" => $userFromSocial->getNickname(),
            "name" => $userFromSocial->getName(),
            "email" => $userFromSocial->getEmail(),
            "avatar" => $userFromSocial->getAvatar(),
        ]);
    }
}
