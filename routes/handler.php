<?php


Route::prefix("pastes")->group(function() {
    Route::get("new", \Wdi\Http\Handlers\CreatePasteHandler::class);
    Route::post("", \Wdi\Http\Handlers\AddPasteHandler::class);
});
