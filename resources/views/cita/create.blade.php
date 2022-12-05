@extends('adminlte::page')

@section('title', 'Crear Citas')

@section('content_header')
   <h1>Insertar Alumno</h1>
@stop

@section('content')

<form action="/cita" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="Nombre" name="Nombre" type="text" class="form-control" tabindex="1">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellidos Paterno</label>
    <input id="Apellido_p" name="Apellido_p" type="text" class="form-control" tabindex="2">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido Materno</label>
    <input id="Apellido_m" name="Apellido_m" type="text" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Asunto</label>
    <input id="Asunto" name="Asunto" type="text" step="any" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input id="fecha" name="fecha" type="date" step="any" class="form-control" tabindex="3">
  </div>
  <a href="/cita" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
