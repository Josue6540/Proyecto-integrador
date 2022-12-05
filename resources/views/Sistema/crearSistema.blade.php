@extends('adminlte::page')

@section('title', 'Crear Sistema')

@section('content_header')
   <h1>Insertar Sistema</h1>
@stop

@section('content')

<form action="/sistema" method="POST">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">Nombre</label>
      <input id="Nombre" name="Nombre" type="text" class="form-control" tabindex="1">
    </div>

    <a href="/sistema" class="btn btn-danger" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    <a href="/indexsistema" class="btn btn-success" tabindex="5">Ver Lista</a>

  </form>
  @stop

  @section('css')
      <link rel="stylesheet" href="/css/admin_custom.css">
  @stop

  @section('js')
  @stop
