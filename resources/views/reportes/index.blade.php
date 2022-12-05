
@extends('adminlte::page')

@section('title', 'Lista de Reportes')

@section('content_header')
    <h1>Listado de Reportes</h1>
@stop

@section('content')
   <a href="reportes/create" class="btn btn-primary mb-3">CREAR</a>

<table id="reportes" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Status</th>
            <th scope="col">Fecha</th>
            <th scope="col">Evaluacion</th>

        </tr>
    </thead>
    <tbody>
        @foreach ($reportes as $reporte)
        <tr>
            <td>{{$reporte->id}}</td>
            <td>{{$reporte->Nombre}}</td>
            <td>{{$reporte->status}}</td>
            <td>{{$reporte->fecha}}</td>
            <td>{{$reporte->evaluacion}}</td>
            <td>
                <form action="{{ route ('reporte.destroy',$reporte->id)}}" method="POST">
                    <a href="/reporte/{{ $reporte->id}}/edit" class="btn btn-info">Editar</a>
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
    $('#reportes').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop
