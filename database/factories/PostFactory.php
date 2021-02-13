<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    $users = User::all();
    return [
        'category_id' => $faker->numberBetween(1,10),
        'title' => $faker->word(),
        'category_id' => $faker->numberBetween(1,10),
        'user_id' => $faker->numberBetween(1, $users->count()),
    ];
});
