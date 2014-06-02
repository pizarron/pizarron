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
          <li>
            <a href="{{url("organization/$model->id")}}">
              <i class="fa fa-chevron-left"></i>&nbsp;
              Return
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
                <br>
                <div class="form-group">
                  {{Form::open(['url'=>"organization/$model->id/edit",
                    'id'=>'basicInfoForm'
                  ])}}
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
                  <b>{{Form::label('description', 'Description:')}}</b>
                  <textarea id="description" name="description" class="input-block-level"
                    rows="18">{{$model->description}}</textarea>
                  <br>
                  {{Form::submit('Save changes', ['class'=>'btn btn-green'])}}
                  {{Form::close()}}
                </div>
              </div>
            </div>
          </div>
          <div class="tab-pane" id="admin-panel">
            <div class="widget widget-green">
              <div class="widget-head">
                <h5>
                  <b><i class="fa fa-lock"></i>&nbsp;Administrators</b>
                </h5>
              </div>
              <div class="widget-body">
                <input type="hidden" id="admin-id" />
                <div class="input-group">
                  <input type="text" id="admin-ac" class="form-control"/>
                  <span class="input-group-btn">
                    <button class="btn btn-green" id="add-admin" title="Add admin">
                      <i class="fa fa-plus"></i>
                    </button>
                  </span>
                </div>
                <br>
                <table class="table table-striped" id="admin-table">
                  <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                  </thead>
                  <tbody>
                    @foreach ($admins as $admin)
                      <tr>
                        <td>
                          <a href="{{url("profile/$admin->id")}}">
                            {{{$admin->name}}}
                          </a>
                        </td>
                        <td>{{{$admin->email}}}</td>
                        <td>
                          <a class="remove" href="#" title="Remove"
                            data-admin-id="{{$admin->id}}">
                            <i class="fa fa-minus-square-o"></i>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="widget widget-green">
              <div class="widget-head">
                <h5><b><i class="fa fa-users"></i>&nbsp;Teachers</b></h5>
              </div>
              <div class="widget-body">
                <input type="hidden" id="teacher-id" />
                <div class="input-group">
                  <input type="text" id="teacher-ac" class="form-control"/>
                  <span class="input-group-btn">
                    <button class="btn btn-green" id="add-teacher" title="Add teacher">
                      <i class="fa fa-plus"></i>
                    </button>
                  </span>
                </div>
                <br>
                <table class="table table-striped" id="teacher-table">
                  <thead>
                    <th>Name</th>
                    <th>Email</th>
                    <th></th>
                  </thead>
                  <tbody>
                    @foreach ($teachers as $teacher)
                      <tr>
                        <td>
                          <a href="{{url("profile/$teacher->id")}}">
                            {{{$teacher->name}}}
                          </a>
                        </td>
                        <td>{{{$teacher->email}}}</td>
                        <td>
                          <a class="remove" href="#" title="Remove"
                            data-teacher-id="{{$teacher->id}}">
                            <i class="fa fa-minus-square-o"></i>
                          </a>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
            </div>
            <div class="widget widget-green">
              <div class="widget-head">
                <h5><b><i class="fa fa-book"></i>&nbsp;Courses</b></h5>
              </div>
              <div class="widget-body">

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
