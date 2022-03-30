@extends ('layouts.app')

@section('content')

<div class="container">
<div class="row">
    <table>
        <tbody>
            <tr>
                <th>
                Nombres y apellidos:
                </th>
                <td>
                    {{$empleado->Nombre}} {{$empleado->ApellidoPaterno}} {{$empleado->ApellidoMaterno}}
                </td>
            </tr>
            <tr>
                <th>
                    Sueldo:
                </th>
                <td>
                {{$empleado->Sueldo}}
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
                <th>Fecha</th>
                <th>Entrada</th>
                <th>Salida</th>
                <th>Permiso</th>
                <th>H. Extra</th>
                <th>Descuento</th>
                <th>Pago</th>
            </tr>
        </thead>
        <tbody>
            <tr >
                <td>{{$empleado->created_at}}</td>
                <td>{{$empleado->id_registro}}</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
            </tr>
            <tr >
                <td>{{$empleado->created_at}}</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
            </tr>         
            <tr >
                <td>{{$empleado->created_at}}</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
            </tr>     
</div>

</tbody>
</table>
<div class="container">
<div class="row">
                <div class="col">
                    <label for="">Pago total</label>
                </div>
                <div class="col">
                    <label for="">Total</label>
                </div>
            </div>

</div>

<a href="{{route('empleado')}}" class="btn btn-success">Regresar</a>

@endsection