<?php

namespace Wdi\Http\Handlers\Paste;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Wdi\Http\Handlers\Handler;

/**
 * Class EditPasteHandler
 * @package Wdi\Http\Handlers\Paste
 */
final class EditPasteHandler extends Handler
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request) : View
    {
        return view("paste.edit")->with("paste", $request->paste);
    }
}
