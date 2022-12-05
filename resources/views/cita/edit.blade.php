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
    <input id="Nombre" name="Nombre" type="text" class="form-control" value="{{$cita->Nombre}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido Paterno</label>
    <input id="Apellido_p" name="Apellido_p" type="text" class="form-control" value="{{$cita->Apellido_p}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido Materno</label>
    <input id="Apellido_m" name="Apellido_m" type="text" class="form-control" value="{{$cita->Apellido_m}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Asunto</label>
    <input id="Asunto" name="Asunto" type="text" step="any" class="form-control" value="{{$cita->Asunto}}">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Fecha</label>
    <input id="fecha" name="fecha" type="date" step="any" class="form-control" value="{{$cita->fecha}}">
  </div>
  <a href="/citas" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
