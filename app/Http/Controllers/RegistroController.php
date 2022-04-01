<?php

namespace App\Http\Controllers;

use App\registro;
use App\Empleado;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegistroController extends Controller
{
    /**
     * Display a listing of the resource. first primer elemento del array y el get() te trae todo el array 
     *
     * @return \Illuminate\Http\Response
     */
    public function index($dni)
    {
        //sizeof cuantos registros hay en el array
        $empleado = Empleado::where('Dni', $dni)->first();
        $registros = Registro::select(
            'registros.id',
            DB::raw('DATE_FORMAT(registros.created_at, "%d/%m/%Y %r") as datetime'),
            'registros.created_at',
            'registros.updated_at',

            'eventos.nombre_evento'
        )
            ->join('eventos', 'eventos.id', '=', 'registros.evento_id') //Aquí están comparando?
            ->where('registros.empleado_id', $empleado->id)
            ->get();

        $entrada = 0;
        $salida = 0;
        $horaextra = 0;
        $permiso = 0;

        

        for ($i = 0; $i < sizeof($registros); $i++) {
            switch ($registros[$i]->nombre_evento) {
                case "Entrada":
                    if (strtotime("08:10:59") < strtotime($registros[$i]->created_at->toTimeString())) {
                        $start_date = new DateTime($registros[0]->created_at->toDateString().' 08:10:59');
                        $since_start = $registros[$i]->created_at->diff($start_date);
    
                        $entrada += $since_start->i+1 ;                      
                    }
                   
                    break;
                case "Salida":
                    $salida++;
                    break;
                case "Hora extra":
                    $horaextra++;
                    break;
                case "Permiso":
                    $permiso++;
                    break;
            }
        }
        return $entrada;

        return 'Entrada: ' . $entrada . ' Salida: ' . $salida . ' Horaextra: ' . $horaextra . ' Permiso: ' . $permiso;
        return view('registros.registro')->with(compact('empleado', 'registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function show(registro $registro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function edit(registro $registro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, registro $registro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\registro  $registro
     * @return \Illuminate\Http\Response
     */
    public function destroy(registro $registro)
    {
        //
    }
}
