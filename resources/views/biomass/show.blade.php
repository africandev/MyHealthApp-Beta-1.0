@extends('includes.content')
@section('content')
<div class="row" >
  <div class="col-lg-3">
    <div class="overview-item overview-item--c{!! $background !!}">
      <div class="overview__inner">
        <div class="overview-box clearfix">
          <div class="icon">
            {!! $result_icon !!}
          </div><br><br>
          <div class="text">
            <h2>{{ number_format($result, 2) }}</h2>
            <h5>{{ date('d M Y', $row->created_at->timestamp )}}</h5>
          </div>
        </div>
        <br>
        <center>
          <a href="biomass/{{ $row->id }}" class="au-btn au-btn-icon au-btn--red">
          <i class="zmdi zmdi-plus"></i>Options</a>
        </center>
        <br>
      </div>
    </div>
  </div>
</div>
@endsection
