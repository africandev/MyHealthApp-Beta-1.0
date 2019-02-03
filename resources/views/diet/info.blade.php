@extends('includes.content')
@section('content')
    <div class="row">
         <div class="col-lg-4">
            <a href="{{ env('APP_URL') }}/diet/{{ $diet->id }}" class="btn btn-success">Retourner</a>
            <div class="card card-chart">
                <div class="card-header">
                    <div class="card-body">
                    <h5>Petite Description</h5>
                    <p>{!! $diet->short !!}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <center>
                    <h3 class="card-title"><i class="tim-icons icon-triangle-right-17"></i> {{ $diet->name }}</h3>
                    <button type="button" class="btn btn-warning m-l-10 m-b-10">Durée Moyenne
                    <span class="badge badge-light">{{ $diet->duration }}</span>
                    </button>
                    </center>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart-area">
                        <p>{!! $diet->body !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
