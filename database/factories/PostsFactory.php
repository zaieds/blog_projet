<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Post::class, function (Faker $faker) {
    $users = App\User::pluck('id')->toArray();
    return [
        'user_id' => $faker->randomElement($users),
        'post_date' => $faker->dateTime($max = 'now', $timezone = null),
        'post_content' => $faker->paragraph(),
        'post_title' => $faker->sentence(),
        'post_name' => $faker->word(),
        'post_status'=> $faker->word(),
        'post_category'=>$faker->word(),
        //'post_type'=> $faker->randomElement(['article', 'media']),
        'post_type' => 'article',
    ];
});