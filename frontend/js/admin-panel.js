(function($) {
  $(document).ready(function() {
    initUploader();
    initSummernote();
    $('#basicInfoForm').on('submit', onBasicInfoFormSubmit);
    $('#add-admin').on('click', addAdmin);
    $('#admin-table').on('click', '.remove', removeAdmin);
    initAutoComplete();
  });

  var initAutoComplete = function() {
    var id = $('#organization-id').val();

    $('#admin-ac').autocomplete({
      serviceUrl: '/organization/'+id+'/admins',
      noCache: true,
      onSelect: function(e) {
        $('#admin-id').val(e.data);
      }
    });
  };

  var addAdmin = function(e) {
    var id, userId, data;
    id = $('#organization-id').val();
    userId = $('#admin-id').val();
    if (!userId) {
      return;
    }
    $('#admin-ac').val('');
    $('#admin-id').val('');
    data = { userId: userId };

    $.post('/organization/'+id+'/add-admin', data).done(function(res) {
      addAdminRow(res.data);
    }).error(function(err){
      console.log('error adding admin');
    });
  };

  var removeAdmin = function(e) {
    e.preventDefault();
    var id = $('#organization-id').val();
    var userId = e.currentTarget.dataset.adminId;
    var data = {userId:userId};
    console.log('Removing ...' + userId);

    $.post('/organization/'+id+'/remove-admin', data).done(function(res) {
      // Remove row
      $(e.currentTarget.parentNode.parentNode).remove();
    }).error(function() {
      console.log('Error removing admin');
    });
  };

  var addAdminRow = function(data) {
    var tpl = '';
    tpl += '<tr><td>';
    tpl += '<a href="/profile/'+data.id+'">' + data.name + '</a></td>';
    tpl += '<td>' + data.email + '</td>';
    tpl += '<td><a class="remove" href="#" title="Remove" data-admin-id="' + data.id + '">';
    tpl += '<i class="fa fa-minus-square-o"></i></a></td>';
    tpl += '</tr>';

    $('#admin-table>tbody').append(tpl);
  };

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
