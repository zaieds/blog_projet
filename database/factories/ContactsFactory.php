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

$factory->define(App\Contact::class, function (Faker $faker) {
    return [
        'contact_name' => $faker->name(),
        'contact_email' => $faker->unique()->safeEmail,
        'contact_message'=> $faker->paragraph(),
        //'contact_date' => $faker->dateTime($max = 'now', $timezone = null),
    ];
});