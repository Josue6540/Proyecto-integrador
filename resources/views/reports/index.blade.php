
@extends('adminlte::page')

@section('title', 'REPORTE')

@section('content_header')
    <h1>Reporte Alumnos</h1>
@stop

@section('content')
<form action="/generatereport" method="post">
    @csrf
    <div class="mb-3">
        <label for="" class="form-label">Fecha Inicial</label>
        <input id="inicial" name="inicial" type="date" class="form-control" required tabindex="1">
    </div>
    <div class="mb-3">
        <label for="" class="form-label">Fecha Final</label>
        <input id="final" name="final" type="date" class="form-control" required tabindex="1">
    </div>
    <button type="submit" class="btn btn-primary" tabindex="4">Guardar</button>
</form>
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
