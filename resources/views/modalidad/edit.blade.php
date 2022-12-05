@extends('adminlte::page')

@section('title', 'Editar Modalidad')

@section('content_header')
    <h1>Editar Modalidad</h1>
@stop

@section('content')
   <form action="/modalidad/{{$modalidad->id}}" method="POST">
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="Nombre" name="Nombre" type="text" class="form-control" value="{{$modalidad->Nombre}}">
  </div>

  <a href="/indexmodalidad" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
