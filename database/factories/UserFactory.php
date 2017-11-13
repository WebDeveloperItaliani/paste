<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\Wdi\Entities\User::class, function (Faker\Generator $faker) {
    return [
        "remember_token" => $faker->sha256,
    ];
});
