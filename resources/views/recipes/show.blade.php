@extends('includes.content')

@section('content')
    <a href="/recipes" class="btn btn-primary">Retourner</a>
    <div class="row">
        <div class="col-sm-6 col-lg-4">
            <div class="card">
                    <img src="{{ env('STORE_URL') }}/recipes/cover_image/{{ $recipe->cover_image }}">
                <div class="card-body">
                    <h4 class="card-title mb-3">
                        {{ $recipe->title }}
                    </h4>
                    <img src="{{ env('STORE_URL') }}/recipes/small_image/{{ $recipe->small_image }}">
                </div>
            </div>
        </div>
        <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <center>
                        <button type="button" class="btn btn-primary m-l-10 m-b-10"><i class="fas fa-utensils"></i> Préparation
                        <span class="badge badge-light">{{ $recipe->preparation_time }} min</span>
                        </button>
                        <button type="button" class="btn btn-success m-l-10 m-b-10"><i class="fas fa-mitten"></i> Cuisson
                        <span class="badge badge-light">{{ $recipe->cooking_time }} min</span>
                        </button>
                        <button type="button" class="btn btn-info m-l-10 m-b-10"><i class="fas fa-weight-hanging"></i> Difficulté
                        <span class="badge badge-light">{{ $level }}</span>
                        </button>
                        </center>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="chart-area">
                                <div class="card-body card-block">
                                <h2>Intro</h2>
                                <p>{{ $recipe->headline }}</p><br>
                                <!--<h2>Ingrédients ({{ $recipe->for }})</h2>
                                <p>Utilisez les cases pour cocher les ingrédients</p>
                                <p>
                                    @foreach ($ingredients as $ingredient)
                                    <input type="checkbox" class="form-check-input"><b>{{ $ingredient->name }}</b> {{ $ingredient->quantity }}<br>
                                    @endforeach
                                </p>-->
                                <br>
                                <p>{!!$recipe->body!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    @if(!Auth::guest())
        @if(Auth::user()->id == $recipe->user_id)
            <a href="/recipes/{{$recipe->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['Modules\RecipesController@destroy', $recipe->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection
