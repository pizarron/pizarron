@extends('master')

@section('content')
<div class="row" style="margin-top: 70px">
  <div class="col-md-6 col-md-offset-3 profile">
    <div class="avatar-container">
      <img id="avatar" src="{{asset("uploads/avatars/$model->picture_url")}}" />
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="widget widget-green">
          <div class="widget-head">
            <h5><i class="fa fa-user"></i>&nbsp;<b>Info</b></h5>
          </div>
          <div class="widget-body">
            meh
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
