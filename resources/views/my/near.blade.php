@extends('includes.brandnew')
@section('authentification')
    <div class="page-content--bge5">
    @include('includes.messages')
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h3> Encore une étape </h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form method="POST" enctype="multipart/form-data" action="/my/process_near">
                            @csrf

                                <div class="form-group">
                                    Choisissez vos unités de mesure habituelles
                                </div>

                                <div class="form-group">
                                    <label for="phone" class="col-lg-6 col-form-label text-md-left">Longueur</label>

                                        <div class="input-group-prepend">
                                            <select name="height_unit"  class="form-control" id="height_unit">
                                                <option class=form-control" value="m" >Mètre (m)</option>
                                                <option class=form-control" value="in" >Pouce (in)</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('height_unit'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('height_unit') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group" >
                                    <label for="mass_unit" class="col-lg-6 col-form-label text-md-left">Poids</label>
                                    <div class="input-group-prepend">
                                        <select name="mass_unit"  class="form-control" id="mass_unit">
                                            <option class=form-control" value="kg" >Kilogramme (kg)</option>
                                            <option class=form-control" value="lb" >Livre (Lb)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="progress mb-2">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="75">75%</div>
                                </div>
                                <button class="au-btn au-btn--block au-btn--blue m-b-20" type="submit"><i class="fas fa-arrow-circle-o-right"></i> On a fini ! </button>
                            </form>
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
