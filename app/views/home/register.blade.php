@extends('master')

@section('content')
<div class="row">
<div class="col-md-5 col-md-offset-3">
  <div class="widget widget-ming">
    <div class="widget-head">
      <h4>Register</h4>
    </div>
    <div class="widget-body">
      {{Form::open()}}
      <div class="form-group">
        <b>{{Form::label('Name:')}}</b><br>
        {{Form::text('name', Input::old('name'), array(
          'placeholder'=>'Your name',
          'class'=>'form-control'
        ))}}
      </div>
      <div class="form-group">
        <b>{{Form::label('Email:')}}</b><br>
        {{Form::email('email', Input::old('email'), array(
          'placeholder'=>'user@example.com',
          'class'=>'form-control'
        ))}}
      </div>
      <div class="form-group">
        <b>{{Form::label('Country:')}}</b><br>
        {{Form::text('country', Input::old('country'), array(
          'placeholder'=>'country',
          'class'=>'form-control'
        ))}}
      </div>
      <div class="form-group">
        <b>{{Form::label('Password:')}}</b><br>
        {{Form::password('password', array(
          'placeholder'=>'Your password',
          'class'=>'form-control'
        ))}}
      </div>
      <div class="form-group">
        <b>{{Form::label('Confirm:')}}</b><br>
        {{Form::password('confirm', array(
          'placeholder'=>'Confirm password',
          'class'=>'form-control'
        ))}}
      </div>
      {{Form::close()}}
    </div>
  </div>
</div>
</div>
@stop
