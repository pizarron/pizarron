@extends('master')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2 course">
    <div class="avatar">
      <div class="row">
        <div class="col-md-4">
          <img src="{{url("uploads/avatars/$model->picture_url")}}" class="img-responsive"/>
        </div>
        <div class="col-md-8">
          <h1>{{$model->title}}</h1>
          @if ($isTeacher)
          <a href="{{url("course/$model->id/admin")}}" class="btn btn-green admin">
            <i class="fa fa-cog"></i>
          </a>
          @endif
          <hr>
          <!-- DESCRIPTION -->
          {{{$model->description}}}
        </div>
      </div>
    </div>
    <div class="body">
    <div class="row">
      <div class="col-md-8">
        <h2>About this course</h2>
        {{$model->about_course}}

        <h2>Syllabus</h2>
        {{$model->syllabus}}

        <h2>Lectures</h2>
        {{$model->lectures}}

      </div>
      <div class="col-md-4">
        <div class="widget widget-green">
          <div class="widget-head">
            <h5><b>
              <i class="fa fa-clock-o"></i>&nbsp;
              General
            </b></h5>
          </div>
          <div class="widget-body">
            <b>Teacher:</b>
            <ul class="profile-list">
              <li>
                <a href="{{url("profile/$teacher->id")}}" class="profile-item">
                  <img src="{{asset("uploads/avatars/$teacher->picture_url")}}" />
                  <div class="details">
                    <h3>{{{$teacher->name}}}</h3>
                    <h5>{{{$teacher->email}}}</h5>
                  </div>
                </a>
              </li>
              <br>
              <b>Live Classes:</b>
            </ul>
          </div>
        </div>
        <div class="widget widget-green">
          <div class="widget-head">
            <h5><b>
              <i class="fa fa-clock-o"></i>&nbsp;
              Coming Classes
            </b></h5>
          </div>
          <div class="widget-body">
            Tuesdays from 09pm to 10pm
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
@stop
