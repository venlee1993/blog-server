<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomDigitNotNull,
        'column_id' => $faker->randomDigitNotNull,
        'title' => $faker->sentence,
        'tag' => $faker->word,
        'cover' => $faker->imageUrl(50, 50),
        'content' => $faker->text
    ];
});
