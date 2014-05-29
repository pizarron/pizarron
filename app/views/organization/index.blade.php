@extends('master')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2 organization">
    <div class="avatar">
      <img src="{{asset("uploads/avatars/$model->picture_url")}}" />
      <div class="description">
        @if ($isOrganizationAdmin)
        <div style="position: absolute; top: -10px; right:0px;">
          <a class="btn btn-green" href="{{url("organization/$model->id/admin")}}">
            <i class="fa fa-cog"></i> Admin
          </a>
        </div>
        @endif
        <h1>{{{$model->name}}}</h1>
        <span><i class="fa fa-envelope-o"></i>&nbsp;
          <a href="mailto:{{$model->email}}">{{$model->email}}</a>
        </span><br>
        <span><i class="fa fa-link"></i>&nbsp;
          <a href="{{$model->website}}" target="_">{{$model->website}}</a>
        </span><br>
        <hr>
        <section>
          {{$model->description}}
        </section>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        <div class="widget widget-green">
          <div class="widget-head">
            <h5><i class="fa fa-user"></i>&nbsp;<b>Our Courses</b></h5>
          </div>
          <div class="widget-body">
            meh
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="widget widget-green">
          <div class="widget-head">
            <h5><i class="fa fa-user"></i>&nbsp;<b>Our Teachers</b></h5>
          </div>
          <div class="widget-body">
            meh
          </div>
        </div>
        <div class="widget widget-green">
          <div class="widget-head">
            <h5><i class="fa fa-user"></i>&nbsp;<b>Top Students</b></h5>
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
