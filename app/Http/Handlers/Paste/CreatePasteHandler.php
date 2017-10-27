<?php

namespace Wdi\Http\Handlers\Paste;

use Illuminate\View\View;
use Wdi\Entities\Language;
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
        $languages = Language::select(["id", "name"])->orderBy("name")->get();
        
        return view("paste.create")->with("languages", $languages);
    }
}
