@extends('includes.content')
@section('content')
		@if(count($biomasses) == 0)
		<div class="row">
			<div class="col-md-12">
	            <div class="overview-wrap">
	                <h2 class="title-1">Biomass</h2>
	                <a href="{{ env('APP_URL') }}/biomass/create" class="au-btn au-btn-icon au-btn--blue">
	                    <i class="zmdi zmdi-plus"></i>Ajouter un BMI</a>
	            </div>
	        </div>
	    </div><br>
		<div class="row" >
			<center>
			<div class="col-lg-10">
		        <div class="card bg-danger">
		            <div class="card-body">
		                <blockquote class="blockquote mb-0">
		                    <p class="text-light">Il n'y a aucun rapport. Ajoutez-en maintenant !
		                </blockquote>
		            </div>
		        </div>
		    </div>
		    </center>
		</div>
		@else
		<div class="row">
			<div class="col-md-12">
	            <div class="overview-wrap">
	                <h2 class="title-1">Biomass</h2> <p><i class="fas fa-angle-up"></i> : Obèsité | <i class="fas fa-check-circle"></i> : Poids Normal | <i class="fas fa-angle-down"></i> : Sous-poids </p>
					<button type="button" class="btn btn-outline-danger btn-lg active"><i class="fab fa-youtube-square"></i> Tutoriel</button>
					<a href="biomass/create" class="au-btn au-btn-icon au-btn--blue">
	                    <i class="zmdi zmdi-plus"></i>Ajouter un BMI</a>
	            </div>
	        </div>
	    </div><br>
			<div class="row">
          <div class="col-lg-6">
              <div class="au-card recent-report">
						<div class="custom-tab">
							<nav>
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
									<a class="nav-item nav-link active show" id="custom-nav-home-tab" data-toggle="tab" href="#custom-nav-home" role="tab" aria-controls="custom-nav-home" aria-selected="true">Régime Proposé</a>
									<a class="nav-item nav-link" id="custom-nav-profile-tab" data-toggle="tab" href="#custom-nav-profile" role="tab" aria-controls="custom-nav-profile" aria-selected="false">Profile</a>
								</div>
							</nav>
							<div class="tab-content pl-3 pt-2" id="nav-tabContent">
								<div class="tab-pane fade active show" id="custom-nav-home" role="tabpanel" aria-labelledby="custom-nav-home-tab">	
										@foreach($diet as $diets)
												<img class="card-img-top" src="{{ env('APP_URL') }}/storage/diet/image/{{ $diets->image }}" alt="Card image cap">
												<div class="card-body">
														<h4 class="card-title mb-3">
															<a href="{{ env('APP_URL') }}/diet/{{ $diets->id }}" >{{ $diets->name }}</a>
														</h4>
														<p class="card-text">{!! $diets->paragraph !!}</p>
												</div>
										@endforeach
								</div>
								<div class="tab-pane fade" id="custom-nav-profile" role="tabpanel" aria-labelledby="custom-nav-profile-tab">
									@foreach($diet as $diet)
									<div class="col-sm-6 col-lg-4">
										<div class="card">
											<img class="card-img-top" src="{{ env('APP_URL') }}/storage/diet/image/{{ $diet->image }}" alt="Card image cap">
											<div class="card-body">
													<h4 class="card-title mb-3">
														<a href="{{ env('APP_URL') }}/diet/{{ $diet->id }}" >{{ $diet->name }}</a>
													</h4>
													<p class="card-text">{!! $diet->paragraph !!}</p>
											</div>
										</div>
									</div>
									@endforeach
								</div>
							</div>

						</div>
              </div>
          </div>
					@foreach($biomasses as $biomass)
					<?php
						if(Auth::user()->mass_unit == 'kg'){
							$mass = $biomass->mass;
						}elseif(Auth::user()->mass_unit == 'lb' ){
							$mass = $biomass->mass * 2.20462;
						}

						if(Auth::user()->height_unit == 'm'){
							$height = $biomass->height;
						}else{
							$height = $biomass->height * 39.3701;
						}
						$bioresult = $mass / ($height * $height);

						if($bioresult >= 25.0){
							$result_icon = '<i class="fas fa-angle-up"></i>';
							$background = '3';
						}elseif($bioresult < 18.5){
							$result_icon = '<i class="fas fa-angle-down"></i>';
							$background = '1';
						}else{
							$result_icon = '<i class="far fa-check-circle"></i>';
							$background = '2';
						}
					?>
					<div class="col-lg-3">
						<div class="overview-item overview-item--c{!! $background !!}">
							<div class="overview__inner">
								<div class="overview-box clearfix">
									<div class="icon">
										{!! $result_icon !!}
									</div><br><br>
									<div class="text">
										<h2>{{ number_format($bioresult, 2) }}</h2>
										<h5>{{ date('d M Y', $biomass->created_at->timestamp )}}</h5>
									</div>
								</div>
								<br>
								<center>
									<a href="biomass/{{ $biomass->id }}" class="au-btn au-btn-icon au-btn--red">
									<i class="zmdi zmdi-plus"></i>Options</a>
								</center>
								<br>
							</div>
						</div>
					</div>

			    @endforeach
      </div>
      <center>
      {{ $biomasses->links() }}
      </center>
    @endif
	</div>
@endsection
