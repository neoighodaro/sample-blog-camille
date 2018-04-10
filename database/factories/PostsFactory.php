<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'user_id' => rand(1, App\User::all()->count()),
        'title' => $faker->sentence,
        'content' => $faker->paragraph(10),
        'excerpt' => $faker->sentence(2),
        'type_id' => rand(1, App\PostType::all()->count()),
        'genre_id' => rand(1, App\PostGenre::all()->count()),
        'image' => 'http://placehold.it/1000x500',
    ];
});
