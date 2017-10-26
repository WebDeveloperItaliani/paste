<?php

namespace Wdi\Http\Handlers\Language;

use Illuminate\View\View;
use Wdi\Entities\Language;
use Wdi\Http\Handlers\Handler;

/**
 * Class ListLanguageHandler
 *
 * @package Wdi\Http\Handlers\Language
 */
final class ListLanguagesHandler extends Handler
{
    /**
     * @return \Illuminate\View\View
     */
    public function __invoke() : View
    {
        $languages = Language::select(["id", "name"])->withCount("pastes")->orderBy("name")->get();
        
        return view("language.list")->with("languages", $languages);
    }
}
