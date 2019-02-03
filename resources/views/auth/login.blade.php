@extends('includes.content')
@section('authentification')
    <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <h3><i class="fas fa-stethoscope"></i> MyHealthApp </h3>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                @csrf
                                <div class="form-group">
                                    <label>Adresse E-Mail</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email">
                                    @if ($errors->has('email'))
                                        <strong>{{ $errors->first('email') }}</strong>
                                @endif
                                </div>
                                <div class="form-group">
                                    <label>Mot de passe</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                    @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="remember">Se rappeler de moi
                                    </label>
                                    <label>
                                        <a href="#">Mot de passe oublié?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">Se Connecter</button>
                            </form>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20"><i class="fab fa-facebook-square"></i><a href="{{url('/redirect')}}"> Se connecter avec Facebook</a></button>
                                    </div>
                                </div>
                            <div class="register-link">
                                <p>
                                    Pas de compte?
                                    <a href="/register">S'enregister</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
