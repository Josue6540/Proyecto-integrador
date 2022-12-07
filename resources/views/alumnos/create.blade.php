@extends('adminlte::page')

@section('title', 'Insertar Alumnos')

@section('content_header')
   <h1>Insertar Alumno</h1>
@stop

@section('content')


<form action="/alumno" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="Nombre" name="Nombre" type="text" class="form-control" required tabindex="1">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido Paterno</label>
    <input id="Apellido_p" name="Apellido_p" type="text" class="form-control" required tabindex="2">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Apellido Materno</label>
    <input id="Apellido_m" name="Apellido_m" type="text" class="form-control" required tabindex="3">
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Matricula</label>
    <input id="matricula" name="matricula" type="text" class="form-control" required tabindex="3">
    @error('matricula')
    <small>
        <strong>{{ $message }}</strong>
    </small>
  @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Carrera</label>
    <select class="form-control" required aria-label="Default select example" name="carrera">
      <option selected value="">Carrera</option>
      @foreach ($carreras as $carrera )
          <option value="{{$carrera->id}}">{{$carrera->nombre}}</option>
  
      @endforeach
  
    </select>
    </div>
  <div class="mb-3">
  <label for="" class="form-label">Modalidad</label>
  <select class="form-control" required aria-label="Default select example" name="modalidad">
    <option selected value="">Modalidad</option>
    @foreach ($modalidades as $modalidad )
        <option value="{{$modalidad->id}}">{{$modalidad->nombre}}</option>

    @endforeach

  </select>
  </div>
  <div class="mb-3">
  <label for="" class="form-label">Sistema</label>
  <select class="form-control" required aria-label="Default select example" name="sistema">
    <option selected value="">Sistema</option>
    @foreach ($sistemas as $sistema )
        <option value="{{$sistema->id}}">{{$sistema->nombre}}</option>

    @endforeach

  </select>

  </div>
  <div class="mb-3">
    <label for="" class="form-label">Correo Electronico</label>
    <input id="email" name="email" required type="text" class="form-control" tabindex="3">
    @error('email')
      <small>
          <strong>{{ $message }}</strong>
      </small>
    @enderror
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Password</label>
    <input id="password" name="paswword" required type="password" class="form-control" tabindex="3">
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
