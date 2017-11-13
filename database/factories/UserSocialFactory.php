<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(\Wdi\Entities\UserSocial::class, function (Faker\Generator $faker) {
    return [
        "user_id" => function () {
            return factory(\Wdi\Entities\User::class)->create();
        },
        "social_id" => $faker->numerify("###########"),
        "provider" => null,
        "oauth_token" => $faker->sha256,
        "oauth_secret" => $faker->sha256,
        "oauth_refresh" => $faker->sha256,
        "expires_in" => $faker->unixTime,
        "email" => $faker->safeEmail,
        "nickname" => $faker->userName,
        "name" => $faker->name,
        "avatar" => $faker->imageUrl(),
    ];
});

$factory->state(\Wdi\Entities\UserSocial::class, "facebook", function () {
    return [
        "provider" => "facebook",
    ];
});
