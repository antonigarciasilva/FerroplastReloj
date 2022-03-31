<?php

namespace App\Http\Controllers;

use App\registro;
use App\Empleado;
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

        $empleado=Empleado::where('Dni',$dni)->first();
        $registros = Registro::select(
            'registros.id',  
            DB::raw('DATE_FORMAT(registros.created_at, "%d/%m/%Y %r") as datetime'),
            'eventos.nombre_evento')
            ->join('eventos', 'eventos.id', '=', 'registros.evento_id')
            ->where('registros.empleado_id', $empleado->id)
            ->get();
        
        return view('registros.registro')->with(compact('empleado', 'registros'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
