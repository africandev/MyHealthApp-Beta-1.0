@extends('includes.content')
@section('content')
<div class="container-fluid">
	<center>
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top" src="https://imagesvc.timeincapp.com/v3/mm/image?url=https%3A%2F%2Fcdn-image.foodandwine.com%2Fsites%2Fdefault%2Ffiles%2Fstyles%2Fmedium_2x%2Fpublic%2Fbuying-healthy-foods-ft-blog0617.jpg%3Fitok%3DfdrZyzB6&w=1000&c=sc&poi=face&q=70" alt="Card image cap">
					<div class="card-body">
						<h4 class="card-title mb-3">{{ $mytime }}</h4>
						<p class="card-text">Entrer le poids que vous venez de mesurer pour obtenir votre résulat
							content.
						</p>
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
								Ajouter un BMI 
							
							<button type="button" class="btn btn-outline-danger btn-lg active"><i class="fab fa-youtube-square"></i> Tutoriel</button>
						
						</h3></div>
						<hr>
						{!! Form::open(['action' => 'Modules\BiomassController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
							<div class="form-group">
								<label for="mass" class="control-label mb-1">
									Votre poids en Kilogrammes
								</label>
								<input type="text" name="mass" id="mass" placeholder="75" class="form-control">
							</div>
							<div class="form-group">
								<label for="height" class="control-label mb-1">
									Votre taille en Mètres
								</label>
								<input type="text" id="disabledInput" name="height" id="height" placeholder="{{ Auth::user()->height }}" value="{{ Auth::user()->height }}" class="form-control" disabled>
								<p><a href="{{ env('APP_URL') }}/my/health" >Modifier votre taille en cliquant ici</a></p>
							</div>
							{{Form::submit('Enregistrer', ['class'=>'btn btn-lg btn-info btn-block'])}}
						{!! Form::close() !!}
					</div>
				</div>
			
			</div>
			<div class="col-md-2">
					
			</div>
</center>
</div>

@endsection
