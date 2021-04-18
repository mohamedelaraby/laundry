<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'name' =>$faker->text(6),
        'body' =>$faker->text(120),
        'user_id' => $faker->numberBetween(1,500),
    ];
});
