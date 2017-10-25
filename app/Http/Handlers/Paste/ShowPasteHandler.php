<?php

namespace Wdi\Http\Handlers\Paste;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Wdi\Http\Handlers\Handler;

/**
 * Class ShowPasteHandler
 *
 * @package Wdi\Http\Handlers\Paste
 */
final class ShowPasteHandler extends Handler
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request) : View
    {
        $paste = $request->paste;
        
        return view("paste.show")->with("paste", $paste);
    }
}
