@extends('includes.content')
@section('authentification')
    <div class="page-content--bgf7">
        @include('includes.messages')
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                                <h3> MyHealthApp </h3>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Adresse E-Mail</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <b id="error">{{ $errors->first('email') }}</b>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label>Prénom</label>
                                    <input class="au-input au-input--full" type="firstname" name="firstname" placeholder="Achraf">
                                    
                                    @if ($errors->has('firstname'))
                                        <span class="help-block">
                                            <b id="error">{{ $errors->first('firstname') }}</b>
                                        </span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label>Nom</label>
                                    <input class="au-input au-input--full" type="lastname" name="lastname" placeholder="Ghellach">
                                    
                                    @if ($errors->has('lastname'))
                                        <span class="help-block">
                                            <b id="error">{{ $errors->first('lastname') }}</b>
                                        </span>
                                    @endif

                                </div>
                                <div class="form-group">
                                    <label for="phone" class="col-lg-6 col-form-label text-md-left">Numéro de téléphone</label>

                                        <div class="input-group mb-6">
                                            <div class="input-group-prepend">
                                                <select name="indicator"  class="form-control" id="indicator">
                                                    @foreach($country as $value)
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
                                </div>
                                <div class="form-group" >
                                    <label for="country" class="col-lg-6 col-form-label text-md-left">Pays</label>
                                    <div class="input-group-prepend">
                                        <select name="country"  class="form-control" id="country">
                                            @foreach($country as $value)
                                            <option class=form-control" value="{{ $value->id }}" >{{ $value->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <label for="phone" class="col-lg-6 col-form-label text-md-left">Genre</label>
                                    <div class="input-group-prepend">
                                        <select name="gender"  class="form-control" id="gender">
                                            <option class=form-control" value="" >Choisissez</option>
                                            <option class=form-control" value="f" >Femme</option>
                                            <option class=form-control" value="m" >Homme</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" >
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label>Confirmation du mot de passe</label>
                                    <input class="au-input au-input--full" type="password" name="password-confirm" >
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Remember Me
                                    </label>
                                    <label>
                                        <a href="#">Forgotten Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">Se connecter avec Facebook</button>
                                        <button class="au-btn au-btn--block au-btn--red">sign in with twitter</button>
                                    </div>
                                </div>
                                <input type="hidden" name="language" value="fr" />
                            </form>
                            <div class="register-link">
                                <p>
                                    Don't you have account?
                                    <a href="#">Sign Up Here</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection


