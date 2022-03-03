@extends ('layouts.app')

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
        <div class="col">
            <label for="">Mes</label>
        </div>
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
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
            </tr>
            <tr >
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
                <td>hello</td>
            </tr>         
            <tr >
                <td>hello</td>
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