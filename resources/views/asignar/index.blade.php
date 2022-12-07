
@extends('adminlte::page')

@section('title', 'Asignar')

@section('content_header')
    <h1>Asignar Alumnos</h1>
@stop

@section('content')
<div class="mb-3">
    <a href="/tsu" class="btn btn-success" tabindex="5">Tecnico Superior Universitario</a>
</div>
<div class="mb-3">
    <a href="/ing" class="btn btn-success" tabindex="5">Ingeniería / Licenciatura</a>
</div>
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
