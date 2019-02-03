@extends('includes.brandnew')
@section('authentification')
    <div class="page-content--bgf7">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h3> Photo de profile </h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form method="POST" enctype="multipart/form-data" action="/my/process_image">
                        @csrf

                        <div class="form-group">
                            Vous pouvez ajouter une photo de profile si vous le désirez.
                        </div>

                        <div class="form-group">
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class="rounded-circle mx-auto d-block" src="{{ env('APP_URL')}}/storage/profile_images/{{ Auth::user()->profile_image }}" alt="Card image cap"><br>
                                    <div class="location text-sm-center">
                                        {{Form::file('profile_image')}}<br><br>
                                        <i class="fa fa-map-marker"></i> Cliquez ci-dessus</div>
                                </div>
                            </div>
                        </div>
                                </div>
                                <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit"><i class="fas fa-arrow-circle-o-right"></i> on y va !</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Maghnet ©  2018 |
                                    <a href="/policy/data"> Politique de protection des données</a>
                                </p>
                            </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
