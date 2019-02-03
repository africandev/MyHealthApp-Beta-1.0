@extends('includes.content')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <span class="btn btn-danger m-l-10 m-b-10">Nouveauté</span>
                <h1>Régimes</h1>
                <button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#RecipesModal">
                    Medium
                </button>
            </div>
        </div>
    </div><br>
    <div class="row m-t-25">
        @foreach($diets as $diet)
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ env('APP_URL') }}/storage/diet/image/{{ $diet->image }}" alt="Card image cap">
                <div class="card-body">
                        <h4 class="card-title mb-3">
                            <a href="{{ env('APP_URL') }}/diet/{{ $diet->id }}" >{{ $diet->name }}</a>
                        </h4>
                        <p class="card-text">{!! $diet->short !!}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
