
@extends('adminlte::page')

@section('title', 'CRUD con Laravel 8')

@section('content_header')
    <h1>Listado de Alumnos</h1>
@stop

@section('content')
   <a href="cita/create" class="btn btn-primary mb-3">CREAR</a>

<table id="citas" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido_p</th>
            <th scope="col">Apellido_m</th>
            <th scope="col">Asunto</th>
            <th scope="col">fecha</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($citas as $cita)
        <tr>
            <td>{{ $cita->id}}</td>
            <td>{{$cita->Nombre}}</td>
            <td>{{$cita->Apellido_p}}</td>
            <td>{{$cita->Apellido_m}}</td>
            <td>{{$cita->Asunto}}</td>
            <td>{{$cita->fecha}}</td>
            <td>
                <form action="{{ route ('cita.destroy',$cita->id)}}" method="POST">
                    <a href="/cita/{{ $cita->id}}/edit" class="btn btn-info">Editar</a>
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
    $('#citas').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop
