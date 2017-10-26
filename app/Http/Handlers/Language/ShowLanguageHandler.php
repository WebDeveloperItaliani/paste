<?php

namespace Wdi\Http\Handlers\Language;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Wdi\Http\Handlers\Handler;

/**
 * Class ShowLanguageHandler
 *
 * @package Wdi\Http\Handlers\Language
 */
final class ShowLanguageHandler extends Handler
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\View\View
     */
    public function __invoke(Request $request) : View
    {
        $language = $request->language;
        $language->load("pastes");
        
        return view("language.show")->with("language", $language);
    }
}
