@extends('includes.content')
@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div class="card card-chart">
                <div class="card-header">
                    <div class="card-body">
                    <h5>Petite Description</h5>
                    <p>{!! $diet->short !!}</p>
                    </div>
                    <img class="card-img-top" src="{{ env('STORE_URL') }}/diet/image/{{ $diet->image }}" alt="Card image cap">
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
                        <p>Informations sur le régime 
                        <a href="{{ env('APP_URL') }}/diet/{{ $diet->id }}/info">(Cliquez Ici)</a></p><br>
                        <h5>Les Etapes du Régime <a href="{{ env('APP_URL') }}/diet/{{ $diet->id }}/steps">(Cliquez pour checklist complete)</a></h5>
                        <br>
                        <h6>Les Etapes faites</h6>
                        @foreach($stepuser as $step)
                        <p>
                            
                                <input type="hidden" value="{{ $step->id }}" name="step"/>
                                <button class="badge badge-success"><i class="fa fa-check"></i></button>
                                <b>{{ $step->name }}</b> : {{ substr($step->body,0,40)  }}...
                        </p>
                        @endforeach
                        <br>
                        <h6>Les Etapes Restantes</h6>
                        @foreach($stepall as $step)
                        <p>
                            <form method="POST" action="{{ env('APP_URL') }}/diet/addsteptouser?step={{ $step->id }}" enctype="multipart/form-data">
                                @csrf  
                                <input type="hidden" value="{{ $step->id }}" name="step"/>
                                <button class="badge badge-danger"><i class="fa fa-check"></i></button>
                                <b>{{ $step->name }}</b> : {{ substr($step->body,0,40)  }}...
                        </p>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
