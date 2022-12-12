
@extends('adminlte::page')

@section('title', 'Listado de Carrera')

@section('content_header')
    <h1>Listado de Carreras</h1>
@stop

@section('content')
   <a href="carrera/create" class="btn btn-primary mb-3">CREAR</a>

<table id="carreras" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Logo</th>
            <th scope="col">Numero</th>
            <th scope="col">Modalidad</th>
            <th scope="col">Sistema</th>



        </tr>
    </thead>
    <tbody>
        @foreach ($carreras as $carrera)
        <tr>
            <td>{{$carrera->nombre}}</td>
            <td><img src ="{{asset("images/".$carrera->logo)}}" width="50" height="50"> </td>
            <td>{{$carrera->numero}}</td>
            <td>{{$carrera->modalidad->nombre}}</td>
            <td>{{$carrera->sistema->nombre}}</td>
            <td>
                <form action="{{ route ('carrera.destroy',$carrera->id)}}" method="POST">
                    <a href="/carrera/{{ $carrera->id}}/edit" class="btn btn-info">Editar</a>
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
    $('#carreras').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop
