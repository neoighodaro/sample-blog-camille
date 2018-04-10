<?php

use Faker\Generator as Faker;

$factory->define(App\PostGenre::class, function (Faker $faker) {
    return [
        'name' => $faker->word
    ];
});
