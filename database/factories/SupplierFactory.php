<?php

use Faker\Generator as Faker;

$factory->define(App\Supplier::class, function (Faker $faker) {
    return [
        'delivery_id' => $faker->randomDigitNotNull,
        'delivery_date' => $faker->date($format = 'Y-m-d', $max = 'now')
    ];
});
