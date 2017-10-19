<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\Wdi\Entities\Language::class, function (Faker\Generator $faker) {
    return [
        "name" => $faker->unique()->lexify(),
    ];
});
