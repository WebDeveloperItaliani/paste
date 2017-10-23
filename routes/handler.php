<?php

use Wdi\Http\Handlers\Paste\{
    AddPasteHandler, CreatePasteHandler, ShowPasteHandler
};

Route::prefix("pastes")->group(function () {
    Route::get("new", CreatePasteHandler::class);
    Route::post("", AddPasteHandler::class);
    
    Route::get("{paste}", ShowPasteHandler::class);
});
