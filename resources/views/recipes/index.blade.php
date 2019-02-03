@extends('includes.content')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <span class="btn btn-danger m-l-10 m-b-10">Nouveauté</span>
                <h1>Choisissez votre filtre</h1>
                <button type="button" class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#RecipesModal">
                    Medium
                </button>
            </div>
        </div>
    </div><br>
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-4">  
            <div class="card">
                <div class="card-body">
                    <h4>Selon votre état de santé</h4><br>
                    <b>Votre Biomass : </b>
                    @if($biomass == '')
                    <a href="{{ env('APP_URL') }}/biomass/create">Ajouter</a><br>
                    @else
                    {{ $biomass }}
                    @endif
                    <b>Vos maladies : </b><br>
                    @foreach(Auth::user()->diseases as $disease)
                         <li>{{ $disease->name }}</li>
                    @endforeach
                    </b>
                    <br>
                    <button type="button" class="btn btn-primary">Confirm</button>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4"> 
            <div class="card">
                <div class="card-body">
                        
                <h4>Par maladie :</h4><br>
                @foreach($diseases as $disease)
                <a href="{{ env('APP_URL') }}/recipes/disease?disease={{ $disease->id }}"><i class="fas fa-arrow-right"></i> {{ $disease->name }} </a>
                <br>
                @endforeach
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-lg-4"> 
            <div class="card">
                <div class="card-body">
                        
                <h4>Par type :</h4><br>
                @foreach($recipetypes as $recipetype)
                <li><a href="{{ env('APP_URL') }}/recipes/type?type={{ $recipetype->id }}" >{{ $recipetype->type_name }}</a></li>
                @endforeach
            </div>
        </div>
    </div>
    </div>
    <hr>
    <center>
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h1>Résultats Aléatoires</h1>
            </div>
        </div>
    </div>
    </center>
    <div class="row m-t-25">
        @foreach($other_recipes as $recipe)
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                <img class="card-img-top" src="{{ env('APP_URL') }}/storage/recipes/cover_image/{{ $recipe->cover_image }}" alt="Card image cap">
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
