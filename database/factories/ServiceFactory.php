<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Models\Service;
use Faker\Generator as Faker;
use Faker\Provider\cs_CZ\DateTime;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'min_time' => $faker->time(),
        'max_time' => $faker->time(),
        'type_id' => $faker->numberBetween(1,500),
        'user_id' => $faker->numberBetween(1,500),
        'appointment_id' => $faker->numberBetween(1,500),
    ];
});
