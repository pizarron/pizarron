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
          <hr>
          <!-- DESCRIPTION -->
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit
          in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
          </p>
        </div>
      </div>
    </div>
    <div class="body">
    <div class="row">
      <div class="col-md-8">
        <h2>About this course</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut

          <ul>
            <li>foo</li>
            <li>bar</li>
            <li>meh</li>
          </ul>
           aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <h2>Syllabus</h2>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
          tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
          quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
          cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
          proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </p>
        <h2>Lectures</h2>
        <p>
          <ul>
            <li>Lecture 1</li>
            <li>Lecture 2</li>
            <li>Lecture 3</li>
          </ul>
        </p>
      </div>
      <div class="col-md-4">
        <div class="widget widget-green">
          <div class="widget-head">
            <h5><b>
              <i class="fa fa-clock-o"></i>&nbsp;
              Live Classes
            </b></h5>
          </div>
          <div class="widget-body">
            Tuesdays from 09pm to 10pm
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
