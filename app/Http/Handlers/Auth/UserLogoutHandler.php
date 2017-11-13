<?php

namespace Wdi\Http\Handlers\Auth;

use Auth;
use Illuminate\Http\RedirectResponse;
use Wdi\Http\Handlers\Handler;

/**
 * Class UserLogoutHandler
 * @package Wdi\Http\Handlers\Auth
 */
final class UserLogoutHandler extends Handler
{
    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke() : RedirectResponse
    {
        Auth::logout();
        
        return redirect()->route("home");
    }
}
