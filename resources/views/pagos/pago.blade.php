@extends('layouts.app')

@section('content_header')
<div class="container">
    <h1 class="card-title">Sueldo de empleados</h1>
</div>
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="form-group col-md-3">
            <select name="empleado" id="empleado" class="form-control">
                <option value="">--SELECCIONAR EMPLEADO--</option>
                <option value="id">empleado 1</option>
                <option value="id">empleado 2</option>
                <option value="id">empleado 3</option>
            </select>
        </div>

        <div class="form-group col-md-3">
            <label for="empleado">Sueldo bruto</label>
        </div>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contenedor" data-whatever="@getbootstrap">Detalles</button>
    </div>


    <div class="modal fade" id="contenedor" tabindex="-1" role="dialog" aria-labelledby="contenedorLabel" aria-hiden="true">
        <div class="modal-dialog" role="documnet">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="contenedorLabel">Detalles laborales </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td><label for="">Horas totales </label></td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label for="">Horas laboradas</label></td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label for="">Horas faltantes</label></td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label for="">Horas extra</label></td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label for="">Horas de permiso</label></td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                            <tr>
                                <td><label for="">Total pago</label></td>
                                <td><input type="text" class="form-control"></td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="form group">
                        <a href="" class="btn btn-success">Pagar</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <a href="{{route('empleado')}}" class="btn btn-success">Regresar</a>

    @endsection