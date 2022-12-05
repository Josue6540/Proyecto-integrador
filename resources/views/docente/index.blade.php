
@extends('adminlte::page')

@section('title', 'Lista de docentes')

@section('content_header')
    <h1>Listado de Docentes</h1>
@stop

@section('content')
   <a href="cita/create" class="btn btn-primary mb-3">CREAR</a>
   <div class="mb-3">
    <label for="formFile" class="form-label">Carga Docentes</label>
    <input class="form-control" type="file" id="logo" name='cdocente'>
  </div>


<table id="citas" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido paterno</th>
            <th scope="col">Apellido materno</th>
            <th scope="col">Numero de personal</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($docentes as $docente)
        <tr>
            <td>{{ $docente->id}}</td>
            <td>{{$docente->nombre}}</td>
            <td>{{$docente->paterno}}</td>
            <td>{{$docente->materno}}</td>
            <td>{{$docente->num_personal}}</td>
            <td>{{$docente->email}}</td>
            <td>{{$docente->password}}</td>

            <td>
                <form action="{{ route ('docente.destroy',$docente->id)}}" method="POST">
                    <a href="/docente/{{ $docente->id}}/edit" class="btn btn-info">Editar</a>
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
    $('#docentes').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop
