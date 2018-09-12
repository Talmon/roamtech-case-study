<?php

use Faker\Generator as Faker;

$factory->define(App\Order::class, function (Faker $faker) {
    return [
        'order_date' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'headquarters_id' => $faker->randomDigitNotNull
    ];
});
