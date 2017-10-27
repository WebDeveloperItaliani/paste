<?php

namespace Wdi\Http\Handlers\Paste;


use Illuminate\Http\RedirectResponse;
use Wdi\Factories\PasteFactory;
use Wdi\Http\Handlers\Handler;
use Wdi\Http\Requests\AddPasteRequest;

/**
 * Class AddPasteHandler
 *
 * @package Wdi\Http\Handlers
 */
final class AddPasteHandler extends Handler
{
    /**
     * @param \Wdi\Http\Requests\AddPasteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(AddPasteRequest $request) : RedirectResponse
    {
        $paste = PasteFactory::create($request->all());
        
        flash()->success("Paste creato con successo!");
        
        return redirect()->route("paste.show", $paste->slug);
    }
}
