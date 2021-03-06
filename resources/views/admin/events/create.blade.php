@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Crear Evento</h1>
@stop

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">

            <form action="{{route('events.save')}}" method="POST" enctype="multipart/form-data">       
                @csrf 
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Titulo</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Titulo del Evento">
                    </div>
                    <div class="form-group">
                        <label for="img_banner">Imagen</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="img_banner" class="custom-file-input" id="img_banner">
                                <label class="custom-file-label"  for="img_banner">Elegir archivo</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="date_event">Fecha</label>
                        <input type="date" class="form-control" name="date_event" id="date_event" placeholder="Fecha del Evento">
                    </div>
                    <div class="form-group">
                        <label for="place_event">Lugar</label>
                        <input type="text" class="form-control" name="place_event" id="place_event" placeholder="Lugar del Evento">
                    </div>
                    <div class="form-group">
                        <label for="description">Descripción</label>
                        <textarea type="textarea" class="form-control" name="description" id="description" placeholder="Descripción del Evento"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control" name="category_id" id="category_id">
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    
                </div>
                
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>

@stop
