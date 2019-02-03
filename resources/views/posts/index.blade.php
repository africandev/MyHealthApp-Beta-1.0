@extends('layouts.user')

@section('content')
    <div class="card card-chart">
        <div class="card-header ">
            <div class="row">
                <div class="col-sm-6 text-left">
                    <h5 class="card-category">Infromations</h5>
                    <h2 class="card-title">Progression de votre Index de Biomasse</h2>
                </div>
                <div class="col-sm-6">
                    <div class="btn-group btn-group-toggle float-right" data-toggle="buttons">
                        <label class="btn btn-sm btn-primary btn-simple active" id="0">
                            <input type="radio" name="options" checked>
                            <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Accounts</span>
                            <span class="d-block d-sm-none">
                    <i class="tim-icons icon-single-02"></i>
                  </span>
                        </label>
                        <label class="btn btn-sm btn-primary btn-simple" id="1">
                            <input type="radio" class="d-none d-sm-none" name="options">
                            <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Purchases</span>
                            <span class="d-block d-sm-none">
                    <i class="tim-icons icon-gift-2"></i>
                  </span>
                        </label>
                        <label class="btn btn-sm btn-primary btn-simple" id="2">
                            <input type="radio" class="d-none" name="options">
                            <span class="d-none d-sm-block d-md-block d-lg-block d-xl-block">Sessions</span>
                            <span class="d-block d-sm-none">
                    <i class="tim-icons icon-tap-02"></i>
                  </span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="chart-area">
                <canvas id="chartBig1"></canvas>
            </div>
        </div>
    </div>
    <h1>Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                    </div>
                    <div class="col-md-8 col-sm-8">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                    </div>
                </div>
            </div>
        @endforeach
        {{$posts->links()}}
    @else
        <p>No posts found</p>
    @endif
@endsection