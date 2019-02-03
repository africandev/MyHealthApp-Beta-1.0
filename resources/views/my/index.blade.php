@extends('includes.content')
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Salut !</h2>
                <a href="biomass/create" class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>Ajouter un BMI</a>
            </div>
        </div>
    </div>
    <div class="row m-t-25">
        <div class="col-sm-6 col-lg-4">
            @foreach($recipe as $a)
            <div class="card">
                <img class="card-img-top" src="{{ env('STORE_URL') }}/recipes/cover_image/{{ $a->cover_image }}" alt="Card image cap">
                <div class="card-body">
                        <h3> Recette au hazard </h3>
                        <h4 class="card-title mb-3">
                            <a href="{{ env('APP_URL') }}/recipe/{{ $a->id }}" >{{ $a->title }}</a>
                        </h4>
                        <p class="card-text">{{ $a->headline }}</p>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="col-sm-6 col-lg-4">
                @foreach($diet as $diets)
                <div class="card">
                    <img class="card-img-top" src="{{ env('STORE_URL') }}/diet/image/{{ $diets->image }}" alt="Card image cap">
                    <div class="card-body">
                            <h3>Régime pour vous </h3>
                            <h4 class="card-title mb-3">
                                <a href="{{ env('APP_URL') }}/diet/{{ $diets->id }}" >{{ $diets->name }}</a>
                            </h4>
                            <p class="card-text">{!! $diets->short !!}</p>
                    </div>
                </div>
            @endforeach
        </div>
        
        <div class="col-sm-6 col-lg-4">
            <div class="overview-item overview-item--c3">
                <div class="overview__inner">
                    <div class="overview-box clearfix">
                        <div class="icon">
                            <i class="zmdi zmdi-calendar-note"></i>
                        </div><br>
                        <div class="text">
                            <h2>{{ number_format($biomass, 2) }}</h2>
                            <span>Votre dernier rapport Biomass</span>
                            <h5><a href="Consulter votre évolution </h5>
                        </div>
                    </div>
                    <div class="overview-chart">
                        <canvas id="widgetChart3"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
@endsection
