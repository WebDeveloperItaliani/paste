<?php

namespace Wdi\Http\Handlers\Paste;

use Illuminate\View\View;
use Wdi\Http\Handlers\Handler;

/**
 * Class CreatePasteHandler
 *
 * @package Wdi\Http\Handlers
 */
final class CreatePasteHandler extends Handler
{
    /**
     * Display the right view to create a new paste
     *
     * @return \Illuminate\View\View
     */
    public function __invoke() : View
    {
        return view("paste.new");
    }
}
