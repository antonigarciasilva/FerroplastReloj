@extends('adminlte::page')

@section('title', 'Empleados')


@section('content_header')
<h1>FerroGroup</h1>
@endsection

@section('content')
<div class="card">

    <div class="card-header">
        <h1 class="card-title">Ferroplast</h1>

    </div>

    <div class="card-body">
        <p>Te da la bienvenida a esta gran familia</p>

    </div>
</div>


@endsection






@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    Swal.fire(
        'Good job!',
        'You clicked the button!',
        'success'
    )
</script>

@stop