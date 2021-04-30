<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'name' => $faker->sentence(6),
        'amount' => $faker->randomFloat(null, 5, 2000.00)
    ];
});
