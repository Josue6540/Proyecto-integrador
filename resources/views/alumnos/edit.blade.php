@extends('adminlte::page')

@section('title', 'Editar cita')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
<form action="/alumno/{{$alumnos->id}}" method="POST">
  @csrf
  @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="Nombre" name="Nombre" type="text" value="{{$alumnos->user->name}}" class="form-control" required tabindex="1">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido Paterno</label>
    <input id="Apellido_p" name="Apellido_p" type="text" value="{{$alumnos->user->paterno}}" class="form-control" required tabindex="2">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido Materno</label>
    <input id="Apellido_m" name="Apellido_m" type="text" value="{{$alumnos->user->materno}}" class="form-control" required tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Matricula</label>
    <input id="matricula" name="matricula" type="text" value="{{$alumnos->matricula}}" class="form-control" required tabindex="3">
    @error('matricula')
    <small>
        <strong>{{ $message }}</strong>
    </small>
  @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Carrera</label>
    <select class="form-control" required aria-label="Default select example" name="carrera">
      <option selected value="{{$alumnos->carrera_id}}">{{$alumnos->carrera->nombre}}</option>
      @foreach ($carreras as $carrera )
          <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
  
      @endforeach
  
    </select>
    </div>
  <div class="mb-3">
  <label for="" class="form-label">Modalidad</label>
  <select class="form-control" required aria-label="Default select example" name="modalidad">
    <option selected value="{{$alumnos->modalidad_id}}">{{$alumnos->modalidad->nombre}}</option>
    @foreach ($modalidades as $modalidad )
        <option value="{{$modalidad->id}}">{{$modalidad->nombre}}</option>

    @endforeach

  </select>
  </div>
  <div class="mb-3">
  <label for="" class="form-label">Sistema</label>
  <select class="form-control" required aria-label="Default select example" name="sistema">
    <option selected value="{{$alumnos->sistema_id}}">{{$alumnos->sistema->nombre}}</option>
    @foreach ($sistemas as $sistema )
        <option value="{{$sistema->id}}">{{$sistema->nombre}}</option>

    @endforeach

  </select>

  </div>
  <div class="mb-3">
    <label for="" class="form-label">Correo Electronico</label>
    <input id="email" name="email" value="{{$alumnos->user->email}}" type="text" class="form-control" tabindex="3">
    @error('email')
      <small>
          <strong>{{ $message }}</strong>
      </small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input id="password" name="paswword" type="password" class="form-control" tabindex="3">
  </div>


  <a href="/alumno" class="btn btn-danger" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <a href="/alumno" class="btn btn-success" tabindex="5">Ver Lista</a>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
