<?php

namespace Wdi\Http\Api;


use Illuminate\Http\JsonResponse;
use Wdi\Entities\Language;

/**
 * Class LanguageApi
 * @package Wdi\Http\Api
 */
final class LanguageApi extends Api
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : JsonResponse
    {
        $languages = Language::select(["id", "name", "extensions"])->orderBy("name")->get();
        
        return response()->json([
            "languages" => $languages
        ]);
    }
}
