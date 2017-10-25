<?php

use Wdi\Http\Handlers\Paste\{
    AddPasteHandler, CreatePasteHandler, ShowPasteForksHandler, ShowPasteHandler
};

Route::prefix("pastes")->group(function () {
    Route::get("new", CreatePasteHandler::class);
    Route::post("", AddPasteHandler::class);
    
    
    Route::prefix("{paste}")->group(function () {
        Route::get("", ShowPasteHandler::class);
        Route::get("forks", ShowPasteForksHandler::class);
    });
});
