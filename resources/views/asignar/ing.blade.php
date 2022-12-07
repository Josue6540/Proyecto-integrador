@extends('adminlte::page')

@section('title', 'Insertar Alumnos')

@section('content_header')
   <h1>Insertar Alumno de Ing</h1>
@stop

@section('content')
<form action="/ingasignar" method="POST">
  @csrf
  <div class="mb-3">
    <label for="" class="form-label">Alumnos</label>
    <select class="form-control" required aria-label="Default select example" name="alumno">
      <option selected value="">Alumnos</option>
      @foreach ($alumnos as $alumno )
          <option value="{{$alumno->idalumno}}">{{$alumno->name}} {{$alumno->paterno}} {{$alumno->materno}}</option>
  
      @endforeach
  
    </select>
    </div>
  <div class="mb-3">
  <label for="" class="form-label">Docente 1</label>
  <select class="form-control" required aria-label="Default select example" name="docente1">
    <option selected value="">Docente</option>
    @foreach ($docentes as $docente )
        <option value="{{$docente->id}}">{{$docente->name}} {{$alumno->paterno}} {{$alumno->materno}}</option>

    @endforeach

  </select>
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Docente 2</label>
    <select class="form-control" required aria-label="Default select example" name="docente2">
      <option selected value="">Docente</option>
      @foreach ($docentes as $docente )
          <option value="{{$docente->id}}">{{$docente->name}} {{$alumno->paterno}} {{$alumno->materno}}</option>
  
      @endforeach
  
    </select>
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Docente 3</label>
        <select class="form-control" required aria-label="Default select example" name="docente3">
          <option selected value="">Docente</option>
          @foreach ($docentes as $docente )
              <option value="{{$docente->id}}">{{$docente->name}} {{$alumno->paterno}} {{$alumno->materno}}</option>
      
          @endforeach
      
        </select>
    </div>

  <a href="/asignar" class="btn btn-danger" tabindex="5">Cancelar</a>
  <button type="submit" class="btn btn-primary" tabindex="4">Asignar</button>

</form>

<table id="alumno" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Alumno</th>
            <th scope="col">Docente Asignado</th>
            <th scope="col">Carrera</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($asigns as $asign)
        <tr>
            <td>{{$asign->id}}</td>
            <td>{{$asign->namea}} {{$asign->paternoa}} {{$asign->maternoa}}</td>
            <td>{{$asign->name}} {{$asign->paterno}} {{$asign->materno}}</td>
            <td>{{$asign->carrera}}</td>
            <td>
                <form action="{{ route ('alumno.destroy',$asign->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                    </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
@stop
