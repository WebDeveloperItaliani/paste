<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\Wdi\Entities\Paste::class, function (Faker\Generator $faker) {
    return [
        "paste_id" => null,
        "user_id" => null,
        "language_id" => null,
        "file_name" => $faker->lexify(),
        "extension" => $faker->fileExtension,
        "code" => $faker->randomHtml(7, 5),
        "description" => $faker->paragraph,
    ];
});

$factory->state(\Wdi\Entities\Paste::class, "forked", function () {
    return [
        "paste_id" => function () {
            return factory(\Wdi\Entities\Paste::class)->create();
        },
    ];
});

$factory->state(\Wdi\Entities\Paste::class, "with-language", function () {
    return [
        "language_id" => function () {
            return factory(\Wdi\Entities\Language::class)->create();
        },
    ];
});
