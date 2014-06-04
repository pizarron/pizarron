@extends ('master')

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2 organization organization-admin">
    <div class="row">
      <div class="col-md-3">
        <ul class="menu-widget">
          <li class="active">
            <a href="#info" data-toggle="tab">
              <i class="fa fa-user"></i>&nbsp;
              Basic Information
            </a>
          </li>
          <li>
            <a href="#admin-panel" data-toggle="tab">
              <i class="fa fa-dashboard"></i>&nbsp;
              Administration Panel
            </a>
          </li>
          <li>
            <a href="#course-resources" data-toggle="tab">
              <i class="fa fa-folder-open-o"></i>&nbsp;
              Course Resources
            </a>
          </li>
          <li>
            <a href="{{url("course/$model->id")}}">
              <i class="fa fa-chevron-left"></i>&nbsp;
              Return
            </a>
          </li>
        </ul>
      </div>
      <div class="col-md-8">
        <div class="tab-content">
          <div class="tab-pane active" id="info">
            @include('course.partials.basic_information')
          </div>
          <div class="tab-pane" id="admin-panel">
            @include('course.partials.admin_panel')
          </div>
          <div class="tab-pane" id="course-resources">
            <h2>TODO</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('styles')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery.fileupload.css')}}">
@stop

@section('other_vendors')
<script src="{{asset('assets/vendor/js/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/vendor/js/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/vendor/js/jquery.fileupload.js')}}"></script>
@stop

@section('scripts')
<script src="{{asset('assets/js/teacher-panel.min.js')}}"></script>
@stop
