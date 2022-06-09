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
                    Listado de Categorias
                </div>
            </div>
            <div class="card-body">
                <table id="events" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>

                            <td>
                                <a href="{{route('categories.edit', $category)}}" class="btn btn-sm btn-warning">Editar</a>
                                <form onsubmit="return confirmAction()" action="{{route('categories.delete', $category)}}" method="POST">
                                    @csrf
                                    <button class="btn btn-sm btn-danger">Eliminar</button>
                                </form>
                                    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    
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

function confirmAction() {
    var result = window.confirm('¿Estas seguro de eliminar este registro?');
    if (result) {
        return true;
    } else {
        return false;
    }
}

$(document).ready(function () {
    $('#events').DataTable();
});
</script>
@stop