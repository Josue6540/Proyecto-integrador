@extends('adminlte::page')

@section('title', 'Editar carrera')

@section('content_header')
    <h1>Editar</h1>
@stop

@section('content')
   <form action="/carrera/{{$carrera->id}}" method="POST" enctype="multipart/form-data">
   @csrf
   @method('PUT')
  <div class="mb-3">
    <label for="" class="form-label">Nombre</label>
    <input id="Nombre" name="Nombre" type="text" class="form-control" value="{{$carrera->nombre}}">
  </div>
  <div class="mb-3">
    <label for="formFile" class="form-label">Logo</label>
    <input class="form-control" type="file" id="logo"  name='logo'>
  </div>
  <div class="mb-3">
    <label for="" class="form-label">Numero</label>
    <input id="numero" name="numero" type="text" class="form-control" value="{{$carrera->numero}}">
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

  <a href="/carrera" class="btn btn-secondary">Cancelar</a>
  <button type="submit" class="btn btn-primary">Guardar</button>
</form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
