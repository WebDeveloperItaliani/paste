<?php

namespace Wdi\Http\Handlers;

use Illuminate\View\View;

/**
 * Class HomePageHandler
 *
 * @package Wdi\Http\Handlers
 */
final class HomePageHandler extends Handler
{
    /**
     * @return \Illuminate\View\View
     */
    public function __invoke() : View
    {
        return view("home");
    }
}
