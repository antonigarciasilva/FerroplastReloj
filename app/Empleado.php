<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{

    //fillable mapea a la BD (nombre, app, correo, etc) y protected lo protege 
    protected $fillable =[
        'Nombre',
        'ApellidoPaterno',
        'ApellidoMaterno',
        'Dni' ,
        'Cargo' ,
        'Telefono', 
        'Correo',
        'Date',
        'Foto',
        'Sueldo',
        'Estado'
    ];
//haciend un mapeo de datos que mi tabla empleados tiene uno o mas registros 
    public function registros(){
        return $this->hasMany(Registro::class);
    }
}

