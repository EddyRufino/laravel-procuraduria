<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Expediente;
use Faker\Generator as Faker;

$factory->define(Expediente::class, function (Faker $faker) {
    return [
        'numExpediente' => $faker->phoneNumber,
        'folio' => '2',
        'especialistaLegal' => $faker->userName,
        'demandante' => $faker->userName,
        'demandado' => $faker->userName,
        'destinatario' => $faker->userName,
        'direccion' => $faker->streetAddress,
        'fechaApertura' => $faker->dateTime($max = 'now', $timezone = null),
        'acto' => $faker->word,
        'fechaAudiencia' => '2020-12-12',
    ];
});
