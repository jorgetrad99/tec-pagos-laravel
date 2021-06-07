<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Card;
use Faker\Generator as Faker;

$factory->define(Card::class, function (Faker $faker) {
    return [
        'balance' => $faker->randomFloat(2, 50, 200),
        /* 'created_at' => $faker->dateTime($max = 'now', $timezone = null) // DateTime('2008-04-25 08:37:17', 'UTC') */
        'user_id' => factory(App\User::class),
        'control_number' => function (array $card) {
            return App\User::find($card['user_id'])->control_number;
        },
    ];
});
