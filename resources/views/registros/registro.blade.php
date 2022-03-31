@extends ('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <table>
            <tbody>
                <tr>
                    <th>
                        <label for="">Nombres y apellidos:</label>
                    </th>
                    <td>
                        <label for=""> {{$empleado->Nombre}} {{$empleado->ApellidoPaterno}} {{$empleado->ApellidoMaterno}}
                        </label>
                    </td>
                </tr>
                <tr>
                    <th>
                        Sueldo:
                    </th>
                    <td>
                        S/. {{$empleado->Sueldo}}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<br>
<br>

<div class="container">
    <table class="table table-bordeless">
        <thead>
            <tr>
                <th>Fecha y hora</th>
                <th>Tipo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($registros as $registro)
            <tr>
                <td>{{$registro->datetime}}</td>
                <td>{{$registro->nombre_evento}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            <div class="col">
                <label for="">Pago total</label>
                <label for=""> S/. {{$empleado->Sueldo}}</label>
            </div>
            <div class="col">
                <label for="">Total</label>
            </div>
        </div>

    </div>

    <a href="{{route('empleado')}}" class="btn btn-success">Regresar</a>

    @endsection