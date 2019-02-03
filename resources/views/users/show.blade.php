@extends('layouts.user')

@section('content')
    <a href="/users" class="btn btn-default">Go Back</a>
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">

                    <h4 class="card-category">{{$user->firstname}}{{$user->lastname}}</h4>
                    <h3 class="card-title"><i class="tim-icons icon-triangle-right-17"></i> </h3>
                </div>
                <div class="card-body">
                    <div class="chart-area">
                        @foreach ($user->disease as $disease)
                        <p>{{ $disease->name }}</p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card-body">
                <div class="chart-area">
                    <p>{!!$user->body!!}</p>
                </div>
            </div>
        </div>
    </div>
    @if(!Auth::guest())
        @if(Auth::user()->id == $user->user_id)
            <a href="/users/{{$user->id}}/edit" class="btn btn-default">Edit</a>

            {!!Form::open(['action' => ['UsersController@destroy', $user->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection