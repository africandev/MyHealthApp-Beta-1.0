@extends('layouts.import')

@section('content')
    <h1>Modifier</h1>
    {!! Form::open(['action' => ['RecipesController@update', $recipe->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('title', 'Title')}}
            {{Form::text('title', $recipe->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            {{Form::label('headline', 'Entête')}}
            {{Form::text('headline', $recipe->headline, ['class' => 'form-control', 'placeholder' => 'Entête'])}}
        </div>
        <div class="form-group">
            {{Form::label('body', 'Body')}}
            {{Form::textarea('body', $recipe->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
        </div>
        <div class="form-group">
            {{Form::file('cover_image')}}
        </div>
        <div class="form-group">
            {{Form::file('small_image')}}
        </div>
        {{Form::hidden('_method','PUT')}}
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection