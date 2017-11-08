<?php

namespace Wdi\Http\Handlers\Paste;

use Illuminate\Http\RedirectResponse;
use Wdi\Http\Handlers\Handler;
use Wdi\Http\Requests\UpdatePasteRequest;

/**
 * Class UpdatePasteHandler
 * @package Wdi\Http\Handlers\Paste
 */
final class UpdatePasteHandler extends Handler
{
    /**
     * @param \Wdi\Http\Requests\UpdatePasteRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(UpdatePasteRequest $request) : RedirectResponse
    {
        $paste = $request->paste;
        $paste->update($request->only(["name", "description", "language_id", "extension", "code"]));
        
        return redirect()->route("paste.show", $paste);
    }
}
