@extends('master')

@section('content')
  @if (Auth::user()->id == $model->id)
  @endif
<div class="row" style="margin-top: 70px">
  <div class="col-md-6 col-md-offset-3 profile">
    <div class="avatar-container">f</div>
    @if (Auth::user()->id == $model->id)
      <div class="profile-edit">Edit</div>
    @endif
    <div class="row">
      <div class="col-md-6">
        <div class="widget widget-ming">
          <div class="widget-head">
            <h5><b>Info</b></h5>
          </div>
          <div class="widget-body">
            {{{ $model->name }}}<br>
            {{ $model->email }}<br>
            {{ $model->country }}<br>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="widget widget-ming">
          <div class="widget-head">
            <h5><b>Trying to learn</b></h5>
          </div>
          <div class="widget-body">
          </div>
        </div>
        <div class="widget widget-ming">
          <div class="widget-head">
            <h5><b>Teaching</b></h5>
          </div>
          <div class="widget-body">
          </div>
        </div>
        <div class="widget widget-ming">
          <div class="widget-head">
            <h5><b>Organizations</b></h5>
          </div>
          <div class="widget-body">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@stop
