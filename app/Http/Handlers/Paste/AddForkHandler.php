<?php

namespace Wdi\Http\Handlers\Paste;

use Illuminate\Http\RedirectResponse;
use Wdi\Factories\PasteFactory;
use Wdi\Http\Handlers\Handler;
use Wdi\Http\Requests\AddPasteRequest;

/**
 * Class AddForkHandler
 * @package Wdi\Http\Handlers\Paste
 */
final class AddForkHandler extends Handler
{
    /**
     * @param \Wdi\Http\Requests\AddPasteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(AddPasteRequest $request) : RedirectResponse
    {
        $paste = PasteFactory::createForkFrom($request->all(), $request->paste);
        
        flash()->success("Paste creato con successo!");
        
        return redirect()->route("paste.show", $paste->slug);
    }
}
