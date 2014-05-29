(function($) {
  $(document).ready(function() {
    initUploader();
    initSummernote();
    $('#basicInfoForm').on('submit', onBasicInfoFormSubmit);
  });
  var initSummernote = function(){
    var options = {
      height: 200,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ]
    };
    $('#description').summernote(options);
  };
  var onBasicInfoFormSubmit = function() {
    $('textarea[name="description"]').html($('#description').code());
  };
  var initUploader = function() {
    var id = $('#organization-id').val();
    var url = '/organization/' + id + '/admin/upload/';
    $('#avatarUploader').fileupload({
        url: url,
        dataType: 'json',
        done: function (e, data) {
          if (data.result.status === 'ok') {
            $('#avatar').attr('src', '/uploads/avatars/' + data.result.fileName);
          }
        },
    }).prop('disabled', !$.support.fileInput)
        .parent().addClass($.support.fileInput ? undefined : 'disabled');
  };
}).call(document, jQuery);
