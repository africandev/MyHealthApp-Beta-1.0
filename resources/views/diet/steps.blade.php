@extends('includes.content')
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <center>
                    <h3 class="card-title"><i class="tim-icons icon-triangle-right-17"></i> {{ $diet->name }}</h3>
                    <button type="button" class="btn btn-warning m-l-10 m-b-10">Durée Moyenne
                    <span class="badge badge-light">{{ $diet->duration }}</span>
                    </button>
                    <h6>{!! $diet->paragraph !!}</h6>
                    </center>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="chart-area">
                        <div class="chart-area">
                            <div class="chart-area">
                                <h5>Les Etapes du Régime <a href="{{ env('APP_URL') }}/diet/{{ $diet->id }}/steps">(Cliquez pour checklist complete)</a></h5>
                                <br>
                                
                                    <h6>Les Etapes Restantes</h6>
                                    @foreach($stepall as $step)
                                    <hr>
                                    <p>
                                        <form method="POST" action="{{ env('APP_URL') }}/diet/addsteptouser?step={{ $step->id }}" enctype="multipart/form-data">
                                        @csrf  
                                        <button class="badge badge-danger"><i class="fa fa-check"></i></button>
                                        <u><b>{{ $step->name }}</b></u> : <b>{{ $step->body }}</b><br>
                                        <br>
                                        <div class="col-lg-9 offset-md-1">
                                            <p>{!! $step->long !!}</p>
                                        </div>
                                    </p>
                                    @endforeach
                                    <br>
                                    <h6>Les Etapes Faites</h6>
                                    @foreach($stepuser as $row)
                                    <p>
                                        <a href="https://google.com">
                                        <span class="badge badge-success"><i class="fa fa-check"></i></span>
                                        </a>
                                        <b>{{ $row->name }}</b> : {{ $row->body }}
                                    </p>
                                    @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
