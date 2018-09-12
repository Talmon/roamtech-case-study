<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'supplier_id' => $faker->randomDigitNotNull,
    ];
});
