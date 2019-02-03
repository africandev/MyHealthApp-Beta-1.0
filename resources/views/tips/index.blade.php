@extends('includes.content')
@section('content')
<div class="container-fluid">
	<center>
		<div class="row">
            @include('includes.messages')
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top" src="https://cdn0.iconfinder.com/data/icons/real-estate-flat-1/2048/661_-_Construction_house-512.png" alt="ERREUR">
				</div>
            </div>
            <div class="col-md-6">
                <div class="card">
                   <div class="card-body">
                        <h1 class="card-title mb-3">ZONE EN CHANTIER</h1>
                        <h5>Section en cours de développement</h5>
                    </div>
                </div>
            </div>
</center>
</div>

@endsection
