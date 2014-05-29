@extends('master')

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
        </ul>
      </div>
      <div class="col-md-8">
        <div class="tab-content">
          <div class="tab-pane active" id="info">
            <div class="widget widget-green">
              <div class="widget-head">
                <h5>
                  <b><i class="fa fa-user"></i>&nbsp;Basic Information</b>
                </h5>
              </div>
              <div class="widget-body">
                <center>
                  <img class="avatar-edit" id="avatar"
                    src="{{url("uploads/avatars/$model->picture_url")}}">
                  <div class="btn btn-green fileinput-button">
                    <span>Upload Image</span>
                    <!-- The file input field used as target for the file upload widget -->
                    <input id="avatarUploader" type="file" name="picture_url">
                  </div>
                </center>
                <div class="form-group">
                  {{Form::hidden('id', $model->id, ['id'=>'organization-id'])}}
                  <b>{{Form::label('name', 'Organization Name:')}}</b>
                  {{Form::text('name', $model->name, [
                    'placeholder'=>'Organization Name',
                    'class'=>'form-control',
                    'autocomplete'=>'off'
                  ])}}
                  <b>{{Form::label('email', 'Organization Email:')}}</b>
                  {{Form::email('email', $model->email, [
                    'placeholder'=>'Organization Email',
                    'class'=>'form-control',
                    'autocomplete'=>'off'
                  ])}}
                  <b>{{Form::label('website', 'Organization Website:')}}</b>
                  {{Form::text('website', $model->website, [
                    'placeholder'=>'Organization Email',
                    'class'=>'form-control',
                    'autocomplete'=>'off'
                  ])}}
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="admin-panel">
            <div class="widget widget-green">
              <div class="widget-head">
                <h5>
                  <b><i class="fa fa-dashboard"></i>&nbsp;Administration Panel</b>
                </h5>
              </div>
              <div class="widget-body">
                TODO!!!
              </div>
            </div>
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
<script src="{{asset('assets/js/admin-panel.min.js')}}"></script>
@endsection
