<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Car;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Car::class, function (Faker $faker) {
    return [
        'type' => $faker->name,
        'code' => Str::random(10),
    ];
});