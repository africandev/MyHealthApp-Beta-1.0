@extends('layouts.user')

@section('content')
    <a href="/recipes" class="btn btn-default">Go Back</a>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <h4 class="card-category">{{$recipe->headline}}</h4>
                    <h3 class="card-title"><i class="tim-icons icon-triangle-right-17"></i> {{$recipe->title}}</h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        <img src="{{ env('STORE_URL') }}/content/recipes/cover_image/{{ $recipe->cover_image }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
                <div class="card-body">
                    <div class="chart-area">
                        <p>{!!$recipe->body!!}</p>
                    </div>
                </div>
        </div>
    </div>
    @if(!Auth::guest())
        @if(Auth::user()->id == $recipe->user_id)
            <a href="/recipes/{{$recipe->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['RecipesController@destroy', $recipe->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection