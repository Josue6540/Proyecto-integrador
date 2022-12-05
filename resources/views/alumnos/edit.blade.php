@extends('adminlte::page')

@section('title', 'Editar cita')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
   <form action="/alumno/{{$alumno->id}}" method="POST">
   @csrf
   @method('PUT')
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
    <label for="" class="form-label">Matricula</label>
    <input id="Apellido_m" name="Apellido_m" type="text" class="form-control" tabindex="3">
  </div>
  <select class="form-select" aria-label="Default select example" name="modalidad">
    <option selected>Modalidad</option>
    @foreach ($modalidades as $modalidad )
        <option value="{{$modalidad->id}}">{{$modalidad->nombre}}</option>

    @endforeach

  </select>
  <select class="form-select" aria-label="Default select example" name="sistema">
    <option selected>Sistema</option>
    @foreach ($sistemas as $sistema )
        <option value="{{$sistema->id}}">{{$sistema->nombre}}</option>

    @endforeach

  </select>

  <div class="mb-3">
    <label for="" class="form-label">Correo Electronico</label>
    <input id="Apellido_m" name="Apellido_m" type="text" class="form-control" tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input id="Apellido_m" name="Apellido_m" type="text" class="form-control" tabindex="3">
  </div>

  <a href="/alumno" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
