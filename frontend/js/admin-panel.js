(function($) {
  $(document).ready(function() {
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
  });
}).call(document, jQuery);
