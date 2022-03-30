<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Registro;
use Faker\Generator as Faker;

$factory->define(Registro::class, function (Faker $faker) {
    return [
        'empleado_id'=>rand(1,10),
        'evento_id' =>rand(1,4)
    ];
});
