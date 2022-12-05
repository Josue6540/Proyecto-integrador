@extends('adminlte::page')

@section('title', 'Editar cita')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
   <form action="/cita/{{$cita->id}}" method="POST">
   @csrf
   @method('PUT')
   <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="Nombre" name="Nombre" type="text" class="form-control" value="{{$evaluacion->nombre}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Status</label>
    <input id="Apellido_p" name="Apellido_p" type="text" class="form-control" value="{{$evaluacion->status}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input id="fecha" name="fecha" type="date" step="any" class="form-control" value="{{$evaluacion->fecha}}">
  </div>
  <div class="mb-3">
    <label for="formFileMultiple" class="form-label">Reporte</label>
    <input class="form-control" type="file" id="reporte" multiple>
  </div>
  <a href="/reporte" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
