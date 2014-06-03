<div class="widget widget-green">
  <div class="widget-head">
    <h5><b>Basic Information</b></h5>
  </div>
  <div class="widget-body">
    <div class="form-group">
      {{Form::open(['url'=>"course/$model->id/edit",
        'id'=>'basicInfoForm'
      ])}}
      <b>{{Form::label('title', 'Title:')}}</b>
      {{Form::text('title', $model->title, [
        'placeholder'=>'Course Title',
        'class'=>'form-control',
        'autocomplete'=>'off'
      ])}}
      <b>{{Form::label('description', 'Description:')}}</b>
      {{Form::textArea('description', $model->description, [
        'class'=>'form-control',
        'rows'=>5,
        'cols'=>5,
      ])}}
      {{Form::close()}}
    </div>
  </div>
</div>
