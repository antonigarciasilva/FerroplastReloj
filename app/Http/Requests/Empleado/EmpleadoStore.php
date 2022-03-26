<?php

namespace App\Http\Requests\Empleado;

use Illuminate\Foundation\Http\FormRequest;
use App\Empleado;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EmpleadoStore extends FormRequest
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
            'Dni' => 'required',
            'Cargo' => 'required|string|max:100',
            'Telefono' => 'required|digits:9',
            'Correo' => 'required|email|unique:empleados',
            'Date' => 'required',
            'Foto' => 'required|max:100000|mimes:jpg,jpeg,png',
            'Sueldo' => 'required|numeric',
            
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
            'Cargo.required' => 'El :attribute es requerido',
            'Cargo.string' => 'El :attribute debe contener solo letras',
            'Cargo.max' => 'El :atributte debe tener como :max caracteres',
            'Telefono.required' => 'El :attribute es requerido',
            'Correo.required' => 'El :attribute es requerido',
            'Correo.email' => 'El :attribute es incorrecto',
            'Date.required' => 'El :attribute es requerido',
            'Sueldo.required' => 'El :attribute es requerido',
            
        ];
    }

    public function storeEmpleado(){
        $request = $this ->validated();

        DB::beginTransaction();
        $image=$request['Foto']->store('public/uploads');
        $url=Storage::url($image);
        try{
           

            Empleado::create([
                'Nombre' => $request['Nombre'],
                'ApellidoPaterno' => $request['ApellidoPaterno'],
                'ApellidoMaterno' => $request['ApellidoMaterno'],
                'Dni' => $request['Dni'],
                'Cargo' => $request['Cargo'],
                'Telefono' => $request['Telefono'],
                'Correo' => $request['Correo'],
                'Date' => $request['Date'],
                'Foto' => $url,
                'Sueldo' => $request['Sueldo']
            ]);
            
            DB::commit();
            return redirect('empleado')->with('mensaje', 'empleado agregado con éxito');
        } catch(\Throwable $th){
            DB::rollBack();
            return $th;
        }
    }
}
