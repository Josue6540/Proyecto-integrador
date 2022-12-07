
@extends('adminlte::page')

@section('title', 'Listado         ')

@section('content_header')
    <h1>Listado de Alumnos</h1>
@stop

@section('content')
   <a href="alumno/create" class="btn btn-primary mb-3">CREAR</a>
   <div class="mb-3">
    <label for="formFile" class="form-label">Carga Alumnos</label>
    <input class="form-control" type="file" id="logo" name='carga'>
  </div>

<table id="alumno" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido paterno</th>
            <th scope="col">Apellido materno</th>
            <th scope="col">Matricula</th>
            <th scope="col">Carrera</th>
            <th scope="col">sistema</th>
            <th scope="col">modalidad</th>
            <th scope="col">Correo Electronico</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($alumnos as $alumno)
        <tr>
            <td>{{$alumno->id}}</td>
            <td>{{$alumno->user->name}}</td>
            <td>{{$alumno->user->paterno}}</td>
            <td>{{$alumno->user->materno}}</td>
            <td>{{$alumno->matricula}}</td>
            <td>{{$alumno->carrera->nombre}}</td>
            <td>{{$alumno->modalidad->nombre}}</td>
            <td>{{$alumno->sistema->nombre}}</td>
            <td>{{$alumno->user->email}}</td>


            <td>
                <form action="{{ route ('alumno.destroy',$alumno->id)}}" method="POST">
                    <a href="/alumno/{{ $alumno->id}}/edit" class="btn btn-info">Editar</a>
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
    <link href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap5.min.css" rel="stylesheet">
@stop

@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap5.min.js"></script>

<script>
$(document).ready(function() {
    $('#alumnos').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop
