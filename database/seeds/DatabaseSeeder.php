<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        factory(App\Empleado::class, 10)->create()->each(function($empleado){
           $empleado->registros()->saveMany(factory(App\Registro::class,3)->make());

        });
        factory(App\User::class,10)->create();
        
        //$this->call(UserSeeder::class);
    }
}
