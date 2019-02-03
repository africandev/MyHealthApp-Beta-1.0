@extends('layouts.import')

@section('content')
    <center><h1>Créer une Recette</h1></center>
    <div class="card">
        <div class="card-body">
            {!! Form::open(['action' => 'Modules\RecipesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            <div class="form-group">
                {{Form::label('title', 'Nom')}}
                {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
            </div>
            <div class="form-group">
                {{Form::label('headline', 'Entête (Slogan)')}}
                {{Form::text('headline', '', ['class' => 'form-control', 'placeholder' => 'Entête'])}}
            </div>

            <div>
                <label name="biomass">Maladie en relation</label>
                <select name="disease_id" class="form-control">
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
            <div>  
                <label name="recipetypes">Type de Recettes</label>
                <select name="type_id" class="form-control">
                    @foreach($recipetypes as $types)
                        <option value="{{ $types->id }}">{{ $types->type_name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div>
                <label name="preparation_time">Temps de Préparation</label>
                <input name="preparation_time" type="number" class="form-control" />
            </div>
            <br>
            <div>
                <label name="cooking_time">Temps de Cuisson</label>
                <input name="cooking_time" type="number" class="form-control" />
            </div>
            <div>
                    <label name="cooking_time">Pour</label>
                    <input name="for" type="for" class="form-control" />
                </div>
            <br>
            <div>
                <label name="level">Niveau de difficulté</label>
                <select name="level" class="form-control">
                    <option value="1" >Facile</option>
                    <option value="2" >Moyen</option>
                    <option value="3" >Avancé/option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <label name="cover_image">Photo principale</label><br>
                {{Form::file('cover_image')}}
            </div>
            <div class="form-group">
                <label name="small_image">Miniature</label><br>
                {{Form::file('small_image')}}
            </div>
            <div class="form-group">
                {{Form::label('body', 'Texte')}}
                {{Form::textarea('body', '', ['id' => 'article-ckeditor1', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            </div>
            {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
            {!! Form::close() !!}
        </div>
    </div>
        
@endsection