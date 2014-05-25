@extends('master')
@section('content')
<div class="row">
<div class="col-md-4 col-md-offset-4">
  <div class="widget widget-green">
    <div class="widget-head">
      <h4>Log In</h4>
    </div>
    <div class="widget-body">
      {{Form::open()}}
      <div class="form-group">
        <b>{{Form::label('Email:')}}</b><br>
        {{Form::email('email', Input::old('email'),array(
          'placeholder'=>'user@example.com',
          'class'=>'form-control',
          'autocomplete'=>'off',
        ))}}
      </div>
      <div class="form-group">
        <b>{{Form::label('Password:')}}</b><br>
        {{Form::password('password', array(
          'placeholder'=>'Password',
          'class'=>'form-control',
          'autocomplete'=>'off',
        ))}}
      </div>
      {{Form::submit('Log In', array(
        'class'=>'btn btn-green'
      ))}}
      {{Form::close()}}
    </div>
  </div>
</div>
</div>
@stop
