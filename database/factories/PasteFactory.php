<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\Wdi\Entities\Paste::class, function (Faker\Generator $faker) {
    return [
        "paste_id" => null,
        "user_id" => null,
        "language_id" => function () {
            return factory(\Wdi\Entities\Language::class)->create();
        },
        "extension" => $faker->randomElement(config("procedural.extensions")),
        "name" => $faker->lexify(),
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

$factory->state(\Wdi\Entities\Paste::class, "plain", function (Faker\Generator $faker) {
    return [
        "code" => $faker->paragraph,
    ];
});

$factory->state(\Wdi\Entities\Paste::class, "with-password", function (Faker\Generator $faker) {
    return [
        "password" => $faker->password,
    ];
});
