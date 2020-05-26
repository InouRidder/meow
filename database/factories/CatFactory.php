<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cat;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Cat::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'type' => ['orange', 'fluffy', 'strange'][rand(0, 2)],
        'found_at' => now()->subDays(rand(1, 100)),
        'age' => rand(1, 20),
    ];
});
