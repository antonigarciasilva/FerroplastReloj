<?php

namespace App\Http\Requests\Empleado;

use Illuminate\Foundation\Http\FormRequest;
use App\Empleado;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class EmpleadoUpdate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'Nombre' => 'required|string|max:100',
            'ApellidoPaterno' => 'required|string|max:100',
            'ApellidoMaterno' => 'required|string|max:100',
            'Dni' => 'required|unique:empleados,Dni,'.$this->segment(3),
            'Cargo' => 'required|string|max:100',
            'Telefono' => 'required|digits:9',
            'Correo' => 'required|email|unique:empleados,Correo,'.$this->segment(3),
            'Date' => 'required',
            'Sueldo' => 'required|numeric',
            'Estado' => 'required|boolean',
        ];
    }

    public function messages()
    {
        return [
            'Nombre.required' => 'El :attribute es requerido',
            'Nombre.string' => 'El :attribute debe contener solo letras',
            'Nombre.max' => 'El :atributte debe tener como :max caracteres',
            'ApellidoPaterno.required' => 'El :attribute es requerido',
            'ApellidoPaterno.string' => 'El :attribute debe contener solo letras',
            'ApellidoPaterno.max' => 'El :atributte debe tener como :max caracteres',
            'ApellidoMaterno.required' => 'El :attribute es requerido',
            'ApellidoMaterno.string' => 'El :attribute debe contener solo letras',
            'ApellidoMaterno.max' => 'El :atributte debe tener como :max caracteres',
            'Dni.required' => 'El :attribute es requerido',
            'Dni.unique' => 'El :attribute ya existe.',
            'Cargo.required' => 'El :attribute es requerido',
            'Cargo.string' => 'El :attribute debe contener solo letras',
            'Cargo.max' => 'El :atributte debe tener como :max caracteres',
            'Telefono.required' => 'El :attribute es requerido',
            'Correo.required' => 'El :attribute es requerido',
            'Correo.email' => 'El :attribute es incorrecto',
            'Date.required' => 'El :attribute es requerido',
            'Sueldo.required' => 'El :attribute es requerido',
            'Estado.required' => 'El :attribute es requerido',

        ];
    }

    public function empleadoActualizar($id)
    {
        $request = $this->validated();
        DB::beginTransaction();
        try {   
            Empleado::where('id', $id)->update([
                'Nombre' => $request['Nombre'],
                'ApellidoPaterno' => $request['ApellidoPaterno'],
                'ApellidoMaterno' => $request['ApellidoMaterno'],
                'Dni' => $request['Dni'],
                'Cargo' => $request['Cargo'],
                'Telefono' => $request['Telefono'],
                'Correo' => $request['Correo'],
                'Date' => $request['Date'],
                'Sueldo' => $request['Sueldo'],
                'Estado' => $request['Estado'],
            ]);
            DB::commit();
            return redirect()->route('empleado')->with('mensaje', 'Empleado modificado');
        } catch (\Throwable $th) {
            DB::rollback();
            return $th;
        }
    }
}
