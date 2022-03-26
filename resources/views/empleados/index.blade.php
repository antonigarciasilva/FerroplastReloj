@extends('adminlte::page')

@section('title', 'empleados')

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

@section('content_header')
<h1>Empleados Ferroplast</h1>
@endsection


@section('content')
<div class="container">

    @if(Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('mensaje')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <button type="button" data-toggle="modal" data-target="#formulario" data-whatever="@getbootstrap" class="btn btn-primary">Registrar nuevo empleado</button>
    @include('empleados.form',['modo'=>'Registrar'])
    @include('empleados.formEdit',['modo'=>'Editar'])

    <br>
    <br>

    <div class="card">
        <div class="card-body">


            <table class="table" id="empleados">
                <thead class="">
                    <tr>
                        <th>#</th>
                        <th>Foto</th>
                        <th>DNI</th>
                        <th>Nombre y apellidos</th>
                        <th>Cargo</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @foreach($empleados as $empleado)
                    <tr>
                        <td>{{$empleado->id }} </td>

                        <td>
                            <img class="img-thumbnail img-fluid" src="{{$empleado->Foto}}" width="100px" height="100px">
                        </td>
                        <td>{{$empleado->Dni}}</td>
                        <td>{{$empleado->Nombre}} {{$empleado->ApellidoPaterno}} {{$empleado->ApellidoMaterno}}</td>
                        <td>{{$empleado->Cargo}}</td>
                        <td>
                            @if($empleado->Estado==1)
                            <span class="badge badge-primary">Activo</span>
                            @else
                            <span class="badge badge-secondary">Inactivo</span>
                            @endif
                        </td>

                        <td>
                            <button type="button" data-toggle="modal" onclick="vistaEmpleado('{{$empleado->id}}')" data-target="#info" data-whatever="@getbootstrap" class="btn btn-sm btn-info" method="post"><i class="far fa-eye"></i>
                            </button>
                            @include('empleados.info', ['id' => $empleado->id])

                            <button id="editarEmpleado" onclick="editarEmpleado('{{$empleado->id}}')" type="button" data-toggle="modal" data-target="#formularioEdit" data-whatever="@getbootstrap" class="btn btn-sm btn-warning"  ><i class="far fa-edit"></i>
                            </button>
                            
                            <form action="{{url('registros/registro')}}" method="post" class="d-inline">

                                <a href="{{url('/registro')}}" class="btn btn-sm bg-purple" type="submit">
                                    <i class=" fas fa-fw fa-solid fa-clipboard-list"></i>
                                </a>
                            </form>

                        </td>

                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>


@endsection


@section('js')
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.bootstrap4.min.js"></script>

<script>
    $(document).ready(function() {
        $('#empleados').DataTable();
    });

    function editarEmpleado(id) {
        $.ajax({
            data: id,
            url: `/empleado/editar/${id}`,
            type: 'GET',
            success: function (res) {
                document.getElementById('act_Id').value = res.data.id;
                document.getElementById('Dni_edit').value = res.data.Dni;
                document.getElementById('ApellidoPaterno_edit').value = res.data.ApellidoPaterno;
                document.getElementById('ApellidoMaterno_edit').value = res.data.ApellidoMaterno;
                document.getElementById('Nombre_edit').value = res.data.Nombre;
                document.getElementById('Cargo_edit').value = res.data.Cargo;
                document.getElementById('Sueldo_edit').value = res.data.Sueldo;
                document.getElementById('Correo_edit').value = res.data.Correo;
                document.getElementById('Date_edit').value = res.data.Date;
                document.getElementById('Telefono_edit').value = res.data.Telefono;
                document.getElementById('Estado_edit').value = res.data.Estado;
            },
            error: function (errors) {
                console.log(errors.data.errors);
            }
        });
    }

    function vistaEmpleado(id) {
        $.ajax({
            data: id,
            url: `/empleado/editar/${id}`,
            type: 'GET',
            success: function (res) {
                document.getElementById('Dni_vista').innerHTML  = res.data.Dni;
                document.getElementById('Nombre_vista').innerHTML  = res.data.Nombre;
                document.getElementById('ApellidoPaterno_vista').innerHTML  = res.data.ApellidoPaterno;
                document.getElementById('ApellidoMaterno_vista').innerHTML  = res.data.ApellidoMaterno;
                document.getElementById('Correo_vista').innerHTML  = res.data.Correo;
                document.getElementById('Telefono_vista').innerHTML  = res.data.Telefono;
                document.getElementById('Cargo_vista').innerHTML  = res.data.Cargo;
                document.getElementById('Sueldo_vista').innerHTML  = res.data.Sueldo;
                document.getElementById('Date_vista').innerHTML  = res.data.Date;
                if(res.data.Estado==1){
                    document.getElementById('Estado_vista').innerHTML  = '<span class="badge badge-primary">Activo</span>';
                }
                else{
                    document.getElementById('Estado_vista').innerHTML  = '<span class="badge badge-secondary">Inactivo</span>';  
                }

            },
            error: function (errors) {
                console.log(errors.data.errors);
            }
        });
    }

</script>

@endsection