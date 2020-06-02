<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Juzgado;
use Faker\Generator as Faker;

$factory->define(Juzgado::class, function (Faker $faker) {
    return [
        'nombreJuzgado' => $faker->company(),
    ];
});
