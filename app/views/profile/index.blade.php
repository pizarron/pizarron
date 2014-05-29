@extends('master')

@section('content')
<div class="row" style="margin-top: 70px">
  <div class="col-md-6 col-md-offset-3 profile">
    <div class="avatar-container">
      <img id="avatar" src="{{asset("uploads/avatars/$model->picture_url")}}" />
    </div>
    @if (Auth::user()->id == $model->id)
      <div class="profile-edit">
        <a href="{{url('profile/edit')}}" class="btn btn-green">
          <i class="fa fa-edit"></i> Edit
        </a>
      </div>
    @endif
    <div class="row">
      <div class="col-md-6">
        <div class="widget widget-green">
          <div class="widget-head">
            <h5><i class="fa fa-user"></i>&nbsp;<b>Info</b></h5>
          </div>
          <div class="widget-body">
            <h2>{{{ $model->name }}}</h2>
            <hr>
            <span>
              <i class="fa fa-envelope-o"></i>&nbsp;&nbsp;
              <a href="mailto:{{$model->email}}">{{ $model->email }}</a>
            </span><br>
            <span>
              <i class="fa fa-flag"></i>&nbsp;&nbsp;
              {{ Form::country($model->country) }}
            </span><br>
            @if ($model->website != null)
            <span>
              <i class="fa fa-link"></i>&nbsp;&nbsp;
              <a href="{{ $model->website }}" target="_">{{$model->website}}</a>
            </span><br>
            @endif
            <span>
              <i class="fa fa-clock-o"></i>&nbsp;&nbsp;
              Joined on {{ Form::formatDate($model->created_at) }}
            </span>
          </div>
        </div>
        <div class="widget widget-green">
          <div class="widget-head">
            <h5>
              <i class="fa fa-briefcase"></i>&nbsp;<b>Bio</b>
            </h5>
          </div>
          <div class="widget-body">
            {{ $model->bio }}<br>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="widget widget-green">
          <div class="widget-head">
            <h5><i class="fa fa-graduation-cap"></i>&nbsp;<b>Trying to learn</b></h5>
          </div>
          <div class="widget-body">
          </div>
        </div>
        <div class="widget widget-green">
          <div class="widget-head">
            <h5><i class="fa fa-wechat"></i>&nbsp;<b>Teaching</b></h5>
          </div>
          <div class="widget-body">
          </div>
        </div>
        <div class="widget widget-green">
          <div class="widget-head">
            <h5><i class="fa fa-university"></i>&nbsp;<b>Organizations</b></h5>
          </div>
          <div class="widget-body">
            @foreach($organizations as $org)
              <a href="{{url("organization/$org->id")}}">{{{ $org->name }}}</a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop
