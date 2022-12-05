@extends('adminlte::page')

@section('title', 'UTGZ')

@section('content_header')
    <h1>Listado de Campus</h1>
@stop

@section('content')
   <a href="campus/create" class="btn btn-primary mb-3">CREAR</a>

<table id="campuses" class="table table-striped table-bordered shadow-lg mt-4" style="width:100%">
    <thead class="bg-primary text-white">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($campuses as $campus)
        <tr>
            <td>{{ $campus->id}}</td>
            <td>{{$campus->nombre}}</td>
            <td>
                <form action="{{ route ('campus.destroy',$campus->id)}}" method="POST">
                    <a href="/campus/{{ $campus->id}}/edit" class="btn btn-info">Editar</a>
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
    $('#campus').DataTable({
        "lengthMenu": [[5,10, 50, -1], [5, 10, 50, "All"]]
    });
} );
</script>

@stop
