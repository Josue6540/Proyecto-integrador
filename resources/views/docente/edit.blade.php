@extends('adminlte::page')

@section('title', 'Editar cita')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
   <form action="/docente/{{$docente->id}}" method="POST">
   @csrf
   @method('PUT')
   <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="Nombre" name="Nombre" type="text" value="{{$docente->user->name}}" class="form-control" required tabindex="1">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellidos Paterno</label>
    <input id="paterno" name="paterno" type="text" value="{{$docente->user->paterno}}" class="form-control" required tabindex="2">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido Materno</label>
    <input id="materno" name="materno" type="text" value="{{$docente->user->materno}}" class="form-control" required tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Numero de personal</label>
    <input id="num_personal" name="num_personal" value="{{$docente->num_personal}}" type="text" step="any" class="form-control" required tabindex="3">
    @error('num_personal')
      <small>
          <strong>{{ $message }}</strong>
      </small>
    @enderror
  </div>
  <div class="mb-3">
      <label for="" class="form-label">Correo Electronico</label>
      <input id="email" name="email" type="text" value="{{$docente->user->email}}" class="form-control" required tabindex="3">
      @error('email')
            <small>
                <strong>{{ $message }}</strong>
            </small>
      @enderror
    </div>
    <div class="mb-3">
      <label for="" class="form-label">Cambiar Password</label>
      <input id="password" name="password" type="password" class="form-control" tabindex="3">
    </div>
  <a href="/docente" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
