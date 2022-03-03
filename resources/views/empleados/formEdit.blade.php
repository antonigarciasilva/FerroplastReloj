@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
    <ul>
        @foreach ($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
    </ul>
</div>
@endif

<div class="modal fade" id="formularioEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="formularioLabel" aria-hiden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4>{{$modo}} empleado </h4>
            </div>
            <div class="modal-body">
                <ul class="list-group" id="alertas"></ul>
                <form action="javascript:void(0)" enctype="multipart/form-data" method="POST">
                    <input type="hidden" id="act_Id" value="" name="act_Id">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="Dni">DNI</label>
                            <input type="text" class="form-control" name="Dni" value="" id="Dni_edit">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="ApellidoPaterno">Apellidos paterno</label>
                            <input type="text" class="form-control" name="ApellidoPaterno" value="" id="ApellidoPaterno_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="ApellidoMaterno">Apellido materno</label>
                            <input type="text" class="form-control" name="ApellidoMaterno" value="" id="ApellidoMaterno_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Nombre">Nombre</label>
                            <input type="text" class="form-control" value="" name="Nombre" id="Nombre_edit">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="Cargo">Cargo</label>
                            <select name="Cargo" id="Cargo_edit" class="form-control">
                                <option value="">-- SELECCIONAR --</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Gerente">Gerente</option>
                                <option value="Contador">Contador</option>
                                <option value="Empleado">Empleado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Sueldo">Sueldo</label>
                            <input type="text" class="form-control" name="Sueldo" value="" id="Sueldo_edit">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="Correo">Correo</label>
                            <input type="text" class="form-control" name="Correo" value="" id="Correo_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="Date">Cumpleaños</label>
                            <input type="Date" class="form-control" name="Date" value="" id="Date_edit">
                        </div>

                        <div class="form-group col-md-4">
                            <label for="Telefono">Telefono</label>
                            <input type="text" class="form-control" name="Telefono" value="" id="Telefono_edit">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="Estado_edit">Estado</label>
                            <select name="Estado_edit" id="Estado_edit" class="form-control">
                                <option value="1">Activo</option>
                                <option value="0">Inactivo</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="Foto">Foto</label>
                            @if(isset($empleado->Foto))
                            <img class="img-thumbnail img-fluid" src="{{$empleado->Foto}}" width="100px" height="100px">
                            @endif
                            <input class="form-control" type="file" name="Foto" value="Foto" id="Foto_edit">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" onclick="actualizarEmpleado()">Actualizar empleado</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function actualizarEmpleado() {
        $("#alertas").empty();
        $('#alertas').removeClass("alert alert-danger");

        var id = document.getElementById('act_Id').value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            data: {
                Dni: document.getElementById('Dni_edit').value,
                ApellidoPaterno: document.getElementById('ApellidoPaterno_edit').value,
                ApellidoMaterno: document.getElementById('ApellidoMaterno_edit').value,
                Nombre: document.getElementById('Nombre_edit').value,
                Cargo: document.getElementById('Cargo_edit').value,
                Sueldo: document.getElementById('Sueldo_edit').value,
                Correo: document.getElementById('Correo_edit').value,
                Date: document.getElementById('Date_edit').value,
                Telefono: document.getElementById('Telefono_edit').value,
                Estado: document.getElementById('Estado_edit').value
            },
            url: `/empleado/actualizar/${id}`,
            type: 'POST',
            success: function(response) {
                window.location.href = "/empleado";
            },
            error: function(errors) {
                $('#alertas').addClass("alert alert-danger");
                $.each(errors.responseJSON.errors, function(index, item) {
                    $('#alertas').append(
                        "<li class='list-group-item'>" + item[0] + "</li>"
                    )
                });
            }
        })
    }
</script>