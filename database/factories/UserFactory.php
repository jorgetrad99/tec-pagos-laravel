<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Validation\Rule;

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

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'control_number' => "{$faker->numberBetween(16, 21)}800{$faker->randomNumber(3)}",
        'email_verified_at' => now(),
        'user_type' => $faker->numberBetween(0, 2),
        'password' => bcrypt('123456'), // password
        'remember_token' => Str::random(10),
    ];
});
