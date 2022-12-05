@extends('adminlte::page')

@section('title', 'Crear Jefe')

@section('content_header')
   <h1>Insertar Jefe de carrera</h1>
@stop

@section('content')

<form action="/jefecarrera" method="POST">
    @csrf
    <div class="mb-3">
      <label for="" class="form-label">Nombre</label>
      <input id="Nombre" name="Nombre" type="text" class="form-control" tabindex="1">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Apellidos Paterno</label>
      <input id="paterno" name="paterno" type="text" class="form-control" tabindex="2">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Apellido Materno</label>
      <input id="materno" name="materno" type="text" class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Numero de personal</label>
      <input id="num_personal" name="num_personal" type="text" step="any" class="form-control" tabindex="3">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Correo Electronico</label>
        <input id="email" name="email" type="text" class="form-control" tabindex="3">
      </div>
      <div class="mb-3">
        <label for="" class="form-label">Password</label>
        <input id="password" name="password" type="text" class="form-control" tabindex="3">
      </div>

    <a href="/jefecarrera" class="btn btn-secondary" tabindex="5">Cancelar</a>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
    <a href="/index" class="btn btn-success" tabindex="5">Ver Lista</a>

  </form>
  @stop

  @section('css')
      <link rel="stylesheet" href="/css/admin_custom.css">
  @stop

  @section('js')
  @stop














@endsection
