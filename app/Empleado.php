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
}
