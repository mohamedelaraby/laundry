<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Price;
use Faker\Generator as Faker;

$factory->define(Price::class, function (Faker $faker) {
    return [
        'price' => $faker->numberBetween(1,50),
        'car_id' => $faker->numberBetween(1,4),
    ];
});
