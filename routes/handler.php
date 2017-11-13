<?php

use Wdi\Http\Handlers\Auth\{
    SocialLoginHandler, SocialRedirectHandler, UserLogoutHandler
};
use Wdi\Http\Handlers\HomePageHandler;
use Wdi\Http\Handlers\Language\{
    ListLanguagesHandler, ShowLanguageHandler
};
use Wdi\Http\Handlers\Paste\{
    AddForkHandler, AddPasteHandler, CreateForkHandler, CreatePasteHandler, EditPasteHandler, ShowPasteForksHandler, ShowPasteHandler, UpdatePasteHandler
};

Route::get("", HomePageHandler::class)->name("home");

Route::prefix("auth")->group(function () {
    
    Route::prefix("login")->group(function () {
        
        Route::prefix("{provider}")->group(function () {
            Route::get("", SocialLoginHandler::class)->name("social.login");
            Route::get("redirect", SocialRedirectHandler::class)->name("social.redirect");
        });
    });
    
    Route::get("logout", UserLogoutHandler::class)->name("auth.logout");
});

Route::prefix("pastes")->group(function () {
    Route::get("create", CreatePasteHandler::class)->name("paste.create");
    Route::post("", AddPasteHandler::class)->name("paste.add");
    
    Route::prefix("{paste}")->group(function () {
        Route::get("", ShowPasteHandler::class)->name("paste.show");
        Route::get("fork", CreateForkHandler::class)->name("fork.create");
        Route::post("fork", AddForkHandler::class)->name("fork.add");
        Route::get("forks", ShowPasteForksHandler::class)->name("paste.forks");
        Route::get("edit", EditPasteHandler::class)->name("paste.edit");
        Route::match(["put", "patch"], "edit", UpdatePasteHandler::class)->name("paste.update");
    });
});

Route::prefix("languages")->group(function () {
    Route::get("", ListLanguagesHandler::class)->name("language.list");
    Route::get("{language}", ShowLanguageHandler::class)->name("language.show");
});
