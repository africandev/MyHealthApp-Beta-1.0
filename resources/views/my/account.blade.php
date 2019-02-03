@extends('includes.content')
@section('content')
<div class="container-fluid">
	<center>
		<div class="row">
            @include('includes.messages')
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top" src="{{ env('STORE_URL') }}/profile_images/{{ Auth::user()->profile_image }}" alt="ERREUR">
					<div class="card-body">
						<h4 class="card-title mb-3"></h4>
						<p class="card-text">Changer la photo de profile</p>
                        @if ($errors->has('profile_image'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('profile_image') }}</strong>
                        </span>
                    @endif
                        <center>{{Form::file('profile_image')}}</center>
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="card">
					<div class="card-header">
					</div>
					<div class="card-body">
						<div class="card-title">
							<h3 class="text-center title-2" >
								{{ Auth::user()->firstname }} {{ Auth::user()->lastname }} 
                            </h3>
						</div>
						<hr>
                        <form action="{{ env('APP_URL') }}/my/update" method="POST" enctype="multipart/form-data" >
                            @csrf
                            <div class="form-group">
								<label for="firstname" class="control-label mb-1">
									Prénom
								</label>
								<input type="text" name="firstname" id="firstname" placeholder="{{ Auth::user()->firstname }}" class="form-control">
                            </div>
                            <div class="form-group">
								<label for="lastname" class="control-label mb-1">
									Nom de Famille
								</label>
								<input type="text" name="lastname" id="lastname" placeholder="{{ Auth::user()->lastname }}" class="form-control">
                            </div>
                            <div class="form-group">
								<label for="email" class="control-label mb-1">
									Adresse E-Mail
								</label>
								<input type="text" name="email" id="email" placeholder="{{ Auth::user()->email }}" class="form-control">
                            </div>
                            <div class="form-group">
								<label for="country" class="control-label mb-1">
									Pays : @foreach ($countryname as $country)
                                        {{ $country->name }}
                                        @endforeach
                                </label>
                                <div class="input-group-prepend">
                                    <select name="country"  class="form-control" id="country">
                                        @foreach($countries as $value)
                                        <option class=form-control" value="{{ $value->id }}" >{{ $value->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                    <label for="language" class="control-label mb-1">
                                        Langue (Compte et Contenu)
                                    </label>
                                    <div class="input-group-prepend">
                                        <select name="language"  class="form-control" id="language">
                                            <option class=form-control" value="fr" >Français</option>
                                            <option class=form-control" value="en" >Anglais</option>
                                            <option class=form-control" value="ar" >العربية</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="form-group">
                                <label for="phone" class="control-label mb-1">Numéro de téléphone</label>

                                <div class="input-group mb-6">
                                    <div class="input-group-prepend">
                                        <select name="indicator"  class="form-control" id="indicator">
                                            @foreach($countries as $value)
                                            <option class=form-control" value="{{ $value->calling_code }}" >+{{ $value->calling_code }} - {{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                        <input id="phone" placeholder="0000-000-000" type="text" class="form-control" name="phone" placeholder="0000-000-000" >
                                    </div>
                                </div>


                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
							<div class="form-group">
								<label for="height" class="control-label mb-1">
									Votre taille en Mètres
								</label>
								<input type="text" id="disabledInput" name="height" id="height" placeholder="{{ Auth::user()->height }}" value="{{ Auth::user()->height }}" class="form-control" disabled>
								<p><a href="{{ env('APP_URL') }}/profile/biomass" >Modifier votre taille en cliquant ici</a></p>
							</div>
							{{Form::submit('Enregistrer', ['class'=>'btn btn-lg btn-info btn-block'])}}
                        </form>
					</div>
				</div>
			
			</div>
			<div class="col-md-2">
					
			</div>
</center>
</div>

@endsection
