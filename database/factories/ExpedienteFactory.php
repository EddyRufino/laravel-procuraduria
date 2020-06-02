<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Expediente;
use App\Juzgado;
use App\Materia;
use App\Proceso;
use Faker\Generator as Faker;

$factory->define(Expediente::class, function (Faker $faker) {
    return [
        'numExpediente' => $faker->swiftBicNumber ,
        'folio' => $faker->numberBetween(1,10),
        'materia_id' => Materia::all()->random(),
        'juzgado_id' => Juzgado::all()->random(),
        'especialistaLegal' => $faker->userName,
        'demandante' => $faker->userName,
        'demandado' => $faker->userName,
        'destinatario' => $faker->userName,
        'direccion' => $faker->streetAddress,
        'fechaApertura' => $faker->dateTimeBetween($startDate = '-3 month', $endDate = 'now', $timezone = null),
        'proceso_id' => Proceso::all()->random(),
        'acto' => $faker->word,
        'fechaAudiencia' => $faker->dateTimeBetween($startDate = '-3 month', $endDate = 'now', $timezone = null),
    ];
});
