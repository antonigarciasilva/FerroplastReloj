@extends('adminlte::page')

@section('title', 'Empleados')


@section('content_header')
<h1>FerroGroup</h1>
@endsection

@section('content')
<div class="card">

    <div class="card-header">
       
        
        <h5 style="vertical-align:middle;margin:15px 50px">Te da la bienvenida a esta gran familia</h5>
     
        <img src="/storage/uploads/123.jpg"  width="800" height="410" style="vertical-align:middle;margin:15px 150px" alt="">
    </div>
 


</div>



@endsection






@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    Swal.fire(
        'Buen trabajo!',
        'Presiona el botón para comenzar!',
        'Éxito'
    )
</script>

@stop