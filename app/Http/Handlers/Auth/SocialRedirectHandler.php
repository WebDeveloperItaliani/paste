<?php

namespace Wdi\Http\Handlers\Auth;

use Auth;
use Illuminate\Http\Request;
use Socialite;
use Wdi\Entities\User;
use Wdi\Entities\UserSocial;
use Wdi\Http\Handlers\Handler;

/**
 * Class SocialRedirectHandler
 * @package Wdi\Http\Handlers\Auth
 */
final class SocialRedirectHandler extends Handler
{
    public function __invoke(Request $request, $provider)
    {
        $userProvider = Socialite::driver($provider)->user();
        
        $userFromSocial = UserSocial::where("social_id", $userProvider->getId())
            ->where("provider", $provider)->first();
        
        
        if ($userFromSocial == null) {
            // First time login
            $user = User::create();
            
            $userFromSocial = UserSocial::create([
                "user_id" => $user->id,
                "social_id" => $userProvider->getId(),
                "provider" => $provider,
                "oauth_token" => $userProvider->token,
                "oauth_secret" => $userProvider->secret ?? null,
                "oauth_refresh" => $userProvider->refreshToken,
                "expires_in" => $userProvider->expiresIn,
                "email" => $userProvider->getEmail(),
                "nickname" => $userProvider->getNickname(),
                "name" => $userProvider->getName(),
                "avatar" => $userProvider->getAvatar(),
            ]);
        }
        
        Auth::login($userFromSocial->user);
        
        // TODO: Use mini dashboard
        return redirect()->route("home");
    }
}
