<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Service;
use App\Models\ServiceType;
use Faker\Generator as Faker;

$factory->define(ServiceType::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->text(120),
        'points' => $faker->numberBetween(1,50),
    ];
});
