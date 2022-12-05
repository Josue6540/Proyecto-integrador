@extends('adminlte::page')

@section('title', 'Crear Carrera')

@section('content_header')
   <h1>Insertar Carrera</h1>
@stop

@section('content')

<form action="/carrera" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="nombre" name="nombre" type="text" class="form-control" tabindex="1" autocomplete="off">
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Logo</label>
    <input class="form-control" type="file" id="logo" name='logo'>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Numero</label>
    <input id="numero" name="numero" type="text" class="form-control" tabindex="3"autocomplete="off">
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

  </select><br><br>

  <a href="/carrera" class="btn btn-danger" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
  <a href="/carrera" class="btn btn-success" tabindex="5">Ver Lista</a>

</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
