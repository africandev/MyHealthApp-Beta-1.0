@extends('includes.content')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <span class="btn btn-danger m-l-10 m-b-10">Nouveauté</span>
                <h1>Recettes</h1>
                <button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#RecipesModal">
                    Medium
                </button>
            </div>
        </div>
    </div><br>
    <div class="row m-t-25">
        @foreach($recipes as $recipe)
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ env('STORE_URL') }}/recipes/cover_image/{{ $recipe->cover_image }}" alt="Card image cap">
                <div class="card-body">
                        <h4 class="card-title mb-3">
                            <a href="{{ env('APP_URL') }}/recipe/{{ $recipe->id }}" >{{ $recipe->title }}</a>
                        </h4>
                        <p class="card-text">{{ $recipe->headline }}</p>
                </div>
            </div>
        </div>
        @endforeach
        @foreach($other_recipes as $recipe)
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ env('STORE_URL') }}/recipes/cover_image/{{ $recipe->cover_image }}" alt="Card image cap">
                <div class="card-body">
                        <h4 class="card-title mb-3">
                            <a href="{{ env('APP_URL') }}/recipe/{{ $recipe->id }}" >{{ $recipe->title }}</a>
                        </h4>
                        <p class="card-text">{{ $recipe->headline }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection
