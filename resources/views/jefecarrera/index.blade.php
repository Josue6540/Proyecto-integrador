@extends('adminlte::page')

@section('title', 'Lista de Jefes de Carrera')

@section('content_header')
    <h1>Listado de Jefes de Carrera</h1>
@stop

@section('content')
   <a href="jefecarrera/create" class="btn btn-primary mb-3">CREAR</a>

<table id="jefe_carreras" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
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
        @foreach ($jefe_carreras as $jefe_carrera)
        <tr>
            <td>{{$jefe_carrera->id}}</td>
            <td>{{$jefe_carrera->nombre}}</td>
            <td>{{$jefe_carrera->paterno}}</td>
            <td>{{$jefe_carrera->materno}}</td>
            <td>{{$jefe_carrera->num_personal}}</td>
            <td>{{$jefe_carrera->email}}</td>
            <td>{{$jefe_carrera->password}}</td>

            <td>
                <form action="{{ route ('jefe_carrera.destroy',$jefe_carrera->id)}}" method="POST">
                    <a href="/jefe_carrera/{{ $jefe_carrera->id}}/edit" class="btn btn-info">Editar</a>
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
    $('#jefe_carreras').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop
