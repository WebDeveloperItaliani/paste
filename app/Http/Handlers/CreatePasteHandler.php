<?php

namespace Wdi\Http\Handlers;

use Illuminate\View\View;
use Wdi\Http\Controllers\Controller as BaseHandler;

/**
 * Class CreatePasteHandler
 *
 * @package Wdi\Http\Handlers
 */
final class CreatePasteHandler extends BaseHandler
{
    /**
     * CreatePasteHandler constructor.
     */
    public function __construct()
    {
    
    }
    
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
