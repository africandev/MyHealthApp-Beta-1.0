@extends('includes.content')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <form method="POST" action="{{ env('APP_URL') }}/diets/subscribe" enctype="multipart/form-data">
                      @csrf  
                      <input type="hidden" value="{{ $diet->id }}" name="diet"/>
                        {{Form::submit('S\'inscrire', ['class'=>'btn btn-primary'])}}
                    </form>
                    <div class="card-body">
                    <h5>Petite Description</h5>
                    <p>{!! $diet->short !!}</p>
                    </div>
                    <img class="card-img-top" src="{{ env('APP_URL') }}/storage/diet/image/{{ $diet->image }}" alt="Card image cap">
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
