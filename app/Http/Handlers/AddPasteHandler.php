<?php

namespace Wdi\Http\Handlers;


use Illuminate\View\View;
use Wdi\Factories\PasteFactory;
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
     * @return \Illuminate\View\View
     */
    public function __invoke(AddPasteRequest $request) : View
    {
        $paste = PasteFactory::create($request->all());
        
        return view("paste.show")->with("paste", $paste);
    }
}
