@extends('layouts.import')

@section('content')
    <h1>Create Recipe</h1>
    {!! Form::open(['action' => 'DiseasesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Nom')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Nom'])}}
        </div>
        <div class="form-group">
            {{Form::label('title', 'Sous Titre')}}
            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Titre'])}}
        </div>
        <div class="form-group">
            {{Form::label('information', 'Informations')}}
            {{Form::textarea('information', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Informations'])}}
        </div>
        <div class="form-group">
            {{Form::label('additional', 'Informations Additionelles')}}
            {{Form::textarea('additional', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Informations Additionelles'])}}
        </div>

        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection