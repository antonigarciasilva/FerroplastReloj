<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Empleado;

class DatatableController extends Controller
{
    public function empleado(){
        $empleados = Empleado::select('Nombre', 'ApellidoPaterno', 'ApellidoMaterno', 'Correo')->get();
        return $empleados->toJson();
    }
}
