<?php

namespace Wdi\Http\Handlers\Paste;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Wdi\Http\Handlers\Handler;

/**
 * Class ShowPasteForksHandler
 *
 * @package Wdi\Http\Handlers\Paste
 */
final class ShowPasteForksHandler extends Handler
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request) : View
    {
        $paste = $request->paste;
        $paste->load(["forks" => function ($query) {
                $query->latest();
        }]);
        
        return view("paste.forks")->with("paste", $paste);
    }
}
