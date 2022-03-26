<?php

namespace App\Http\Controllers;

use App\Empleado;
use App\Http\Requests\Empleado\EmpleadoStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Empleado\EmpleadoUpdate;
use Illuminate\Http\JsonResponse;

class EmpleadoController extends Controller
{

    public function index()
    {
        //var_dum variable para debugear, tengo que ver lo que estoy enviando en pantalla y eso.
        $empleados = Empleado::get();
        return view('empleados.index')->with(compact('empleados'));
    }

    public function create()
    {
        return view('empleados.create');
    }


    public function store(EmpleadoStore $request)
    {
        return $request->storeEmpleado();
    }


    public function show(Empleado $empleados)
    {
        //{!! $empleados->links() !!} ->sirve para paginar simple, en el final de la tabla del index 
    }


    public function edit( $id)
    { 
        $empleado = Empleado::findOrFail($id);
        return new JsonResponse([
            'status' => "Éxito",
            'message' => "Empleado encontrado",
            "data" => $empleado
        ], 200);
    }


    public function update(EmpleadoUpdate $request, $id)
    {
        return $request->empleadoActualizar($id);
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        Storage::delete('public/' . $empleado->Foto);
        Empleado::destroy($id);

        return redirect('empleados')->with('mensaje', 'Empleado eliminado');
    }
}
