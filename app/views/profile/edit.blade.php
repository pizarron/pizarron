@extends('master')

@section('content')
<div class="row" style="margin-top: 70px">
  <div class="col-md-6 col-md-offset-3 profile">
    <div class="avatar-container">
      <img id="avatar" src="{{asset("uploads/avatars/$model->picture_url")}}" />
    </div>
    <!-- <input id="avatarUploader" type="file" name="picture_url"> -->
    <div class="btn btn-ming fileinput-button">
        <span>Upload Image</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="avatarUploader" type="file" name="picture_url">
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="widget widget-ming">
          <div class="widget-head">
            <h5><b>Basic Info</b></h5>
          </div>
          <div class="widget-body">
            {{Form::open(['url'=>'profile/edit'])}}
            <div class="form-group">
              <b>{{Form::label('name', 'Name:')}}</b>
              {{Form::text('name', $model->name, [
                'placeholder'=>'Your name',
                'class'=>'form-control',
                'autocomplete'=>'off'
              ])}}
              <b>{{Form::label('email', 'Email:')}}</b>
              <span class="form-control">{{$model->email}}</span>
              <b>{{Form::label('country', 'Country:')}}</b>
              {{Form::select('country', $countries, $model->country, [
                'class'=>'form-control'
              ])}}
              <b>{{Form::label('website', 'Web Site:')}}</b>
              {{Form::text('website', $model->website, [
                'placeholder'=>'URL',
                'class'=>'form-control',
                'autocomplete'=>'off'
              ])}}
              <b>{{Form::label('bio', 'Bio:')}}</b>
              {{Form::textarea('bio', $model->bio, [
                'class'=>'form-control',
                'rows'=>5,
                'cols'=>5
              ])}}
            </div>
            {{Form::submit('Save changes', [
              'class' => 'btn btn-ming'
            ])}}
            {{Form::close()}}
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="widget widget-ming">
          <div class="widget-head">
            <h5><b>Security Info</b></h5>
          </div>
          <div class="widget-body">
            {{Form::open(['url'=>'profile/security/edit'])}}
            <div class="form-group">
              <b>{{Form::label('current', 'Current Password:')}}</b>
              {{Form::password('current', [
                'placeholder'=>'Your current password',
                'class'=>'form-control',
                'autocomplete'=>'off'
              ])}}
              <b>{{Form::label('new_password', 'New Password:')}}</b>
              {{Form::password('new_password', [
                'placeholder'=>'Your new password',
                'class'=>'form-control',
                'autocomplete'=>'off'
              ])}}
              <b>{{Form::label('confirm', 'Confirm Password:')}}</b>
              {{Form::password('confirm', [
                'placeholder'=>'Confirm your new password',
                'class'=>'form-control',
                'autocomplete'=>'off'
              ])}}
              {{Form::submit('Change Password', [
                'class'=>'btn btn-ming'
              ])}}
            </div>
            {{Form::close()}}
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@stop

@section('scripts')
<script>
  $(document).ready(function() {
    $('#avatarUploader').fileupload({
        url: '{{url('profile/upload')}}',
        dataType: 'json',
        done: function (e, data) {
          if (data.result.status === 'ok') {
            $('#avatar').attr('src', '/uploads/avatars/' + data.result.fileName);
          }
        },
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
  });
</script>
@stop

@section('other_vendors')
<script src="{{asset('assets/vendor/js/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/vendor/js/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/vendor/js/jquery.fileupload.js')}}"></script>
@stop

@section('styles')
<link rel="stylesheet" href="{{asset('assets/vendor/css/jquery.fileupload.css')}}">
@stop
