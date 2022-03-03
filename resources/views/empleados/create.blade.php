@extends('adminlte::page')
@section('content')
<div class="container">

@csrf
@include('empleados.form',['modo'=>'Crear']);


</div>
@endsection