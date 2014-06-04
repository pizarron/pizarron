<div class="widget widget-green">
  <div class="widget-head">
    <h5><b>Basic Information</b></h5>
  </div>
  <div class="widget-body">
    <center>
      <img class="avatar-edit" id="avatar"
        src="{{url("uploads/avatars/$model->picture_url")}}">
      <div class="btn btn-green fileinput-button">
        <span>Upload Image</span>
        <!-- The file input field used as target for the file upload widget -->
        <input id="avatarUploader" type="file" name="picture_url">
        {{Form::hidden('id', $model->id, ['id'=>'course-id'])}}
      </div>
    </center>
    <br>
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
      <br>
      <b>{{Form::label('about_course', 'About Course:')}}</b>
      <textarea id="about_course" name="about_course" class="input-block-level"
        rows="18">{{$model->about_course}}</textarea>
      <br>
      <b>{{Form::label('syllabus', 'Syllabus:')}}</b>
      <textarea id="syllabus" name="syllabus" class="input-block-level"
        rows="18">{{$model->syllabus}}</textarea>
      <br>
      <b>{{Form::label('lectures', 'Lectures:')}}</b>
      <textarea id="lectures" name="lectures" class="input-block-level"
        rows="18">{{$model->lectures}}</textarea>
      <br>
      {{Form::submit('Save Changes', [
        'class'=>'btn btn-green'
      ])}}
      {{Form::close()}}
    </div>
  </div>
</div>
