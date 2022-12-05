@extends('adminlte::page')

@section('title', 'Crear Evaluaciones')

@section('content_header')
   <h1>Crear Evaluaciones</h1>
@stop

@section('content')

<form action="/evaluacion" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="Nombre" name="Nombre" type="text" class="form-control" tabindex="1">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Status</label>
    <input id="Apellido_p" name="Apellido_p" type="text" class="form-control" tabindex="2">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input id="fecha" name="fecha" type="date" step="any" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="formFileMultiple" class="form-label">Evaluacion</label>
    <input class="form-control" type="file" id="evaluacion" multiple>
  </div>

  <a href="/evaluacion" class="btn btn-secondary" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <a href="/index" class="btn btn-success" tabindex="5">Ver Lista</a>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
