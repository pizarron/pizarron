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
            <a href="#admin-panel" data-toggle="tab">
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
        </div>
      </div>
    </div>
  </div>
</div>
@stop
