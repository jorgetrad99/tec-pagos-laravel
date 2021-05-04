<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    return [
        'control_number' => "18800{$faker->unique()->randomNumber(3, false)}",
        'balance' => $faker->randomFloat(2, 50, 200)
    ];
});
