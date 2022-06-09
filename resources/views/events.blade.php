@extends('layouts.base')

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection


@section('banner')
<div class="col-sm-12 col-md-10 banner-container text-center">
    <img src="/images/uploads/events/{{$banner->img_banner}}" class="img-fluid banner-image" alt="Banner principal">
    <div class="text-block">
        <h4 class="text-block-title">{{$banner->title}}</h4>
        <p class="text-block-subtitle mb-2">{{$banner->place_event}}</p>
        <p class="text-block-subtitle mb-2">{{$banner->date_event}}</p>
        <a href="" class="btn btn-sm btn-primary-yellow rounded-12">Ver Detalle</a>
    </div>
</div>
@endsection

@section('content')
<main class="row justify-content-center">

    <div class="col-10 text-center text-white pt-5 pb-2">
        <h1>Eventos disponibles</h1>
    </div>

    <!-- Filtro -->
    <div class="d-flex justify-content-center">
        <div class="col-auto lead m-1">
            <span id="passwordHelpInline" class="form-text text-white fw-light">
                <i class="fas fa-filter"></i>
                Filtrar por categoría
            </span>
        </div>
        <div class="col-auto m-1">
            <select class="form-select" id="category-id">
                @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <!-- Grid de eventos -->
    <div class="col-md-10 col-12 py-3" >
        <div class="row justify-content-center events-grid" id="events-grid-container">

            @foreach($events as $event)
            <div class="col-md-4 col-sm-12 text-center event mb-4">
                <img src="/images/uploads/events/{{$event->img_banner}}" class="img-fluid" alt="Norway" style="width:100%; height:100%; object-fit: cover;">
                <div class="text-block">
                    <h4 class="text-block-title">{{$event->title}}</h4>
                    <p class="text-block-p mb-0 fw-400">{{$event->date_event}}</p>
                    <p class="text-block-p mb-0 fw-400">{{$event->place_event}}</p>
                    <a href="" class="btn btn-sm btn-primary-yellow rounded-12">Ver Detalle</a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</main>
@endsection

@section('js')
<script>
    document.getElementById('category-id').addEventListener('change', function(e) {
        let categoryId = e.target.value;
        submitFilter(categoryId);
    });

    function submitFilter(categoryId) {

        let data = {
            'category_id': (categoryId)? categoryId : null,
        };

        let url = '/event/filter/';

        fetch(url, {
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            method: 'POST',
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then( result => {
            if(result.success) {
                let container = document.getElementById('events-grid-container');
                let events = result.events;
                let newGrid = "";

                events.forEach(event => {
                    newGrid += `
                    <div class="col-md-4 col-sm-12 text-center event mb-4">
                        <img src="/images/uploads/events/{{$event->img_banner}}" class="img-fluid" alt="Norway" style="width:100%; height:100%; object-fit: cover;">
                        <div class="text-block">
                            <h4 class="text-block-title">${event.title}</h4>
                            <p class="text-block-p mb-0 fw-400">${event.date_event}</p>
                            <p class="text-block-p mb-0 fw-400">${event.place_event}</p>
                            <a href="" class="btn btn-sm btn-primary-yellow rounded-12">Ver Detalle</a>
                        </div>
                    </div>
                    `
                });
                container.innerHTML = newGrid;

            }
        })
        .catch(function(error) {
            console.log(error);
        });

    }
</script>
@endsection