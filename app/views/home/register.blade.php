@extends('master')

@section('content')
<div class="row">
<div class="col-md-5 col-md-offset-3">
  <div class="widget widget-green">
    <div class="widget-head">
      <h4>Register</h4>
    </div>
    <div class="widget-body">
      @include('partials.register')
    </div>
  </div>
</div>
</div>
@stop
