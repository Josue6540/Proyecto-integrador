@extends('adminlte::page')

@section('title', 'Insertar Docentes')

@section('content_header')
   <h1>Insertar Docentes</h1>
@stop

@section('content')


<form action="/docente" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="Nombre" name="Nombre" type="text" class="form-control" tabindex="1">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido Paterno</label>
    <input id="Apellido_p" name="Apellido_p" type="text" class="form-control" tabindex="2">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido Materno</label>
    <input id="Apellido_m" name="Apellido_m" type="text" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Numero de Personal</label>
    <input id="matricula" name="matricula" type="text" class="form-control" tabindex="3">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Correo Electronico</label>
    <input id="email" name="email" type="text" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input id="password" name="paswword" type="text" class="form-control" tabindex="3">
  </div>


  <a href="/docente" class="btn btn-danger" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <a href="/docente" class="btn btn-success" tabindex="5">Ver Lista</a>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
