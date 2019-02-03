@extends('layouts.import')

@section('content')
    <center><h1>Create a Diet</h1></center>
    <div class="card">
        <div class="card-body">
            {!! Form::open(['action' => 'Modules\DietController@insert', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('name', 'Name')}}
                {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
            </div>
            <div class="form-group">
                    {{Form::label('duration', 'Durée')}}
                    {{Form::text('duration', '', ['class' => 'form-control', 'placeholder' => 'Durée'])}}
                </div>
            <br>
            <div>
                <label name="biomass">Maladie en relation</label>
                <select name="disease" class="form-control">
                    <option value="">Aucune (Général)</option>
                    @foreach($diseases as $disease)
                    <option value="{{ $disease->id }}">{{ $disease->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label name="biomass">Biomass</label>
                <select name="biomass" class="form-control">
                    <option value="" >CHOISIR</option>
                    <option value="" >Pour tous</option>
                    <option value="1" >Sous-poids</option>
                    <option value="2" >Poids Normal</option>
                    <option value="3" >Sur-poids / Obésité</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label name="image">Image</label><br>
                {{Form::file('image')}}
            </div>
            <br>
            <div class="form-group">
                    {{Form::label('paragraph', 'Une Intro')}}
                    {{Form::textarea('paragraph', '', ['id' => 'article-ckeditor1', 'class' => 'form-control', 'placeholder' => 'Une Intro'])}}
            </div>
            <br>
            <div class="form-group">
                {{Form::label('body', 'Texte')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor2', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
            <br>
            <div class="form-group">
                    {{Form::label('short', 'Courte Description')}}
                    {{Form::textarea('short', '', ['id' => 'article-ckeditor3', 'class' => 'form-control', 'placeholder' => 'short'])}}
            </div>
            <br>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
        <hr>
        <h1>Add Step</h1>
        <div class="card-body">
            <form action="{{ env('APP_URL') }}/diet/addstep" method="GET" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="name" class="control-label mb-1">
                    Nom
                </label>
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="diet_id" class="control-label mb-1">
                    Diet 
                </label>
                <div class="input-group-prepend">
                    <select name="diet_id"  class="form-control" id="diet_id">
                        @foreach($diets as $diet)
                        <option class=form-control" value="{{ $diet->id }}" >{{ $diet->id }} : {{ $diet->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="control-label mb-1">
                    Courte Description
                </label>
                <input type="text" name="body" id="body" class="form-control">
            </div>
            <div class="form-group">
                    {{Form::label('long', 'Long Version')}}
                    {{Form::textarea('long', '', ['id' => 'article-ckeditor4', 'class' => 'form-control', 'placeholder' => 'short'])}}
            </div>
            
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            </form>
        </div>
    </div>
        
@endsection