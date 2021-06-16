<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\History;
use Faker\Generator as Faker;

$factory->define(History::class, function (Faker $faker) {
    return [
        'control_number' => 18800272,
        'name' => 'Constancia de Estudios',
        'amount' => 2,
        'cost' => 30.00,
        'total' => 60.00
    ];
});
