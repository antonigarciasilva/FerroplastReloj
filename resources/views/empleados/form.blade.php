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

<div class="modal fade" data-backdrop="static" data-keyboard="false" id="formulario" tabindex="-1" role="dialog" aria-labelledby="formularioLabel" aria-hiden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h1>{{$modo}} empleado </h1>
                @isset($id)
                <h1>{{$id}}</h1>
                @endisset
            </div>
            <div class="modal-body">
                <ul class="list-group" id="alertaRegistro"></ul>
                <form action="javascript:void(0)" method="post" id="FormularioDeRegistro" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="Dni">DNI</label>
                            <input type="text" class="form-control" name="Dni" id="Dni">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="Estado">Estado</label>
                            <select name="Estado" id="Estado" class="form-control">
                                <option value="1">Activo</option>
                                <option value="0">Inacctivo</option>
                            </select>

                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="ApellidoPaterno">Apellidos paterno</label>
                            <input type="text" class="form-control" name="ApellidoPaterno" value="{{isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno') }}" id="ApellidoPaterno">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="ApellidoMaterno">Apellido materno</label>
                            <input type="text" class="form-control" name="ApellidoMaterno" value="{{isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno')}}" id="ApellidoMaterno">
                        </div>
                    </div>

                    <div class="form-group ">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" value="{{isset($empleado->Nombre)?$empleado->Nombre:old('Nombre')}}" name="Nombre" id="Nombre">
                    </div>


                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="Cargo">Cargo</label>
                            <select name="Cargo" id="Cargo" class="form-control">
                                <option value="">-- SELECIONAR --</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Gerente">Gerente</option>
                                <option value="Contador">Contador</option>
                                <option selected value="Empleado">Empleado</option>
                            </select>

                        </div>
                        <div class="form-group col-md-6">
                            <label for="Sueldo">Sueldo</label>
                            <input type="text" class="form-control" name="Sueldo" value="{{isset($empleado->Sueldo)?$empleado->Sueldo:old('Sueldo')}}" id="Sueldo">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Correo">Correo</label>
                        <input type="text" class="form-control" name="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:old('Correo')}}" id="Correo">
                    </div>
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="Date">Cumpleaños</label>
                            <input type="Date" class="form-control" name="Date" value="{{isset($empleado->Date)?$empleado->Date:old('Date')}}" id="Date">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="Telefono">Telefono</label>
                            <input type="text" class="form-control" name="Telefono" value="{{isset($empleado->Telefono)?$empleado->Telefono:old('Telefono')}}" id="Telefono">
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="Foto"></label>

                        <input class="form-control" type="file" name="Foto" value="Foto" id="Foto">
                    </div>

                    <button type="submit" class="btn btn-success" onclick="registrarEmpleado()">
                        {{$modo}} empleado
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <br>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
    function registrarEmpleado() {
        $("#alertaRegistro").empty();
        $('#alertaRegistro').removeClass("alert alert-danger");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData($(FormularioDeRegistro)[0]);
        $.ajax({
            data: {
                Dni: document.getElementById('Dni').value,
                ApellidoPaterno: document.getElementById('ApellidoPaterno').value,
                ApellidoMaterno: document.getElementById('ApellidoMaterno').value,
                Nombre: document.getElementById('Nombre').value,
                Cargo: document.getElementById('Cargo').value,
                Sueldo: document.getElementById('Sueldo').value,
                Correo: document.getElementById('Correo').value,
                Date: document.getElementById('Date').value,
                Telefono: document.getElementById('Telefono').value,
                Foto: document.getElementById('Foto'),

            },
            url: "{{route('empleado.guardar')}}",
            type: 'POST',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            success: function(response) {
                window.location.href = "/empleado";
            },

            error: function(errors) {
                $('#alertaRegistro').addClass("alert alert-danger");
                $.each(errors.responseJSON.errors, function(index, item) {
                    $('#alertaRegistro').append(
                        "<li class='list-group-item'>" + item[0] + "</li>"
                    )
                });
            }
        });
    }
</script>