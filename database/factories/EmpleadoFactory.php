<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Empleado;
use Faker\Generator as Faker;

$factory->define(Empleado::class, function (Faker $faker) {
    return [
        'Nombre'=>$faker->name,
        'ApellidoPaterno'=>$faker->lastName,
        'ApellidoMaterno'=>$faker->lastName,
        'Dni'=>rand(30000000, 79999999),
        'Cargo'=>$faker->randomElement(['Administrador','Empleado','Gerente', 'Contador']),
        'Telefono'=>rand(900000000, 999999999),
        'Correo'=>$faker->freeEmail,
        'Date'=>$faker->date,
        'Foto'=>'/storage/uploads/123.jpg',
        'Sueldo'=>rand(930,9999),
        'Estado'=>$faker->boolean
    ];
});
