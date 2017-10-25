<?php

namespace Wdi\Http\Handlers\Paste;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Wdi\Factories\PasteFactory;
use Wdi\Http\Handlers\Handler;

/**
 * Class ForkPasteHandler
 *
 * @package Wdi\Http\Handlers\Paste
 */
final class ForkPasteHandler extends Handler
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Request $request) : RedirectResponse
    {
        $fork = PasteFactory::createForkFrom($request->paste);
        
        return redirect()->route("paste.show", $fork->slug);
    }
}
