@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Listado de Eventos
                </div>
            </div>
            <div class="card-body">
                <table id="events" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Titulo</th>
                            <th>Imagen</th>
                            <th>Fecha Evento</th>
                            <th>Lugar Evento</th>
                            <th>Status</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($events as $event)
                        <tr>
                            <td>{{$event->title}}</td>
                            <td>
                                <img src="/images/uploads/events/{{$event->img_banner}}" alt="" width="150px">
                            </td>
                            <td>{{$event->date_event}}</td>
                            <td>{{$event->place_event}}</td>
                            <td>{{$event->status}}</td>
                            <td>
                                <button class="btn btn-sm btn-warning">Editar</button>
                                <button class="btn btn-sm btn-danger">Eliminar</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

@stop

@section('css')
@stop

@section('js')
<script>
$(document).ready(function () {
    $('#events').DataTable();
});
</script>
@stop