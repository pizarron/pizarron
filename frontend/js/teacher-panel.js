(function($) {
  $(document).ready(function(){
    initUploader();
    initSummernote();
  });
  initUploader = function() {
    var id = $('#course-id').val();
    var url = '/course/'+id+'/admin/upload';
    $('#avatarUploader').fileupload({
      url: url,
      dataType: 'json',
      done: function(e, data) {
        if (data.result.status === 'ok') {
          $('#avatar').attr('src', '/uploads/avatars/' + data.result.fileName);
        }
      }
    });
  };
  initSummernote = function() {
    var options = {
      height: 200,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['para', ['ul', 'ol']],
      ]
    };
    $('#about_course').summernote(options);
    $('#syllabus').summernote(options);
    $('#lectures').summernote(options);
    $('#basicInfoForm').on('submit', onFormSubmit);
  };
  onFormSubmit = function() {
    $('textarea[name="about_course"]').html($('#about_course').code());
    $('textarea[name="syllabus"]').html($('#syllabus').code());
    $('textarea[name="lectures"]').html($('#lectures').code());
  };
}).call(document, jQuery);
