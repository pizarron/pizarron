{{Form::open(['action'=>'HomeController@doRegister'])}}
<div class="form-group">
  <b>{{Form::label('Name:')}}</b><br>
  {{Form::text('name', Input::old('name'), array(
    'placeholder'=>'Your name',
    'class'=>'form-control',
    'autocomplete'=>'off'
  ))}}
</div>
<div class="form-group">
  <b>{{Form::label('Email:')}}</b><br>
  {{Form::email('email', Input::old('email'), array(
    'placeholder'=>'user@example.com',
    'class'=>'form-control',
    'autocomplete'=>'off'
  ))}}
</div>
<div class="form-group">
  <b>{{Form::label('Country:')}}</b><br>
  {{Form::select('country', $countries, 'BO', array(
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
{{Form::submit('Register', array('class'=>'btn btn-ming'))}}
{{Form::close()}}
