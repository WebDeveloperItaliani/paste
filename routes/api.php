<?php

Route::prefix("languages")->group(function() {
   Route::get("", "LanguageApi@index");
});
