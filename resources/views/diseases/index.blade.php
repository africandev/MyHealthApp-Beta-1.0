@extends('layouts.user')

@section('content')
    <div class="card card-chart">
        <div class="card-header ">
            <div class="row">
                <div class="col-sm-6 text-center">
                    <h5 class="card-category">Maladies</h5>
                    
                </div>
                <div class="col-sm-6 text-left">
                    <div class="alert alert-danger">
                        <span>
                            <b> Toutes les maladie du site. </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card ">
              <div class="card-header">
                <h4 class="card-title"> Simple Table</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive ps">
                  <table class="table tablesorter " id="">
                    <thead class=" text-primary">
                      <tr>
                        <th>
                          Nom
                        </th>
                        <th>
                          Sous-Titre
                        </th>
                        <th>
                          Lien
                        </th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($diseases as $disease)
                      <tr>
                        <td>
                         {{ $disease->name }} 
                        </td>
                        <td>
                          {{ $disease->title }}
                        </td>
                        <td>
                          <a href="diseases/{{ $disease->id }}" >Go</a>
                        </td>
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
              </div>
            </div>
          </div>
@endsection