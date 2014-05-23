@extends('master')

@section('content')
<div class="row" style="margin-top: 70px">
  <div class="col-md-6 col-md-offset-3 profile">
    <div class="avatar-container">f</div>
    <input id="avatarUploader" type="file" name="profile_url" multiple>
    <div id="progress" class="progress">
        <div class="progress-bar progress-bar-success"></div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="widget widget-ming">
          <div class="widget-head">
            <h5><b>Basic Info</b></h5>
          </div>
          <div class="widget-body">
            {{Form::open(['url'=>'profile/edit', 'files'=>true])}}
            <div class="form-group">
              <b>{{Form::label('name', 'Name:')}}</b>
              {{Form::text('name', $model->name, [
                'placeholder'=>'Your name',
                'class'=>'form-control',
                'autocomplete'=>'off'
              ])}}
              <b>{{Form::label('email', 'Email:')}}</b>
              {{Form::email('email', $model->email,[
                'placeholder'=>'Your email',
                'class'=>'form-control',
                'autocomplete'=>'off'
              ])}}
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
            $.each(data.result.files, function (index, file) {
                $('<p/>').text(file.name).appendTo('#files');
            });
        },
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            $('#progress .progress-bar').css(
                'width',
                progress + '%'
            );
        }
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
  });
</script>
@stop

@section('other_vendors')
<script src="{{asset('assets/vendor/jquery.ui.widget.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.iframe-transport.js')}}"></script>
<script src="{{asset('assets/vendor/jquery.fileupload.js')}}"></script>
@stop

@section('styles')
<link rel="stylesheet" href="{{asset('assets/vendor/jquery.fileupload.css')}}">
@stop
