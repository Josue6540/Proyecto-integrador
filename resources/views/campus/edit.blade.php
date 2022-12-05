@extends('adminlte::page')

@section('title', 'Editar Campus')

@section('content_header')
    <h1>Editar Campus</h1>
@stop

@section('content')
   <form action="/campus/{{$campus->id}}" method="POST">
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="Nombre" name="Nombre" type="text" class="form-control" value="{{$campus->Nombre}}">
  </div>

  <a href="/index" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
