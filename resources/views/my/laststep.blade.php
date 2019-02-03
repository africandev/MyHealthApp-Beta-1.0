@extends('includes.brandnew')
@section('authentification')
    <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <h3> Encore une étape </h3>
                            </a>
                        </div>
                        <div class="login-form">
                            <form method="POST" enctype="multipart/form-data" action="/my/process_laststep">
                            @csrf

                                <div class="form-group">
                                    Quelle est votre taille ?
                                </div>

                                <div class="form-group">
                                    <label for="height" class="control-label mb-1">
                                        Votre taille en {{ $unit }}
                                    </label>
                                    <input type="text" name="height" id="height" class="form-control">
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
