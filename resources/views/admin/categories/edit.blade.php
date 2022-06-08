@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Editar Evento</h1>
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <form action="{{route('categories.update', $category)}}" method="POST">       
                @csrf 
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Nombre de la Categoria" value="{{$category->name}}">
                    </div>
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
