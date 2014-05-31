(function($) {
  $(document).ready(function() {
    initUploader();
    initSummernote();
    $('#basicInfoForm').on('submit', onBasicInfoFormSubmit);
    $('#add-admin').on('click', addAdmin);
    $('#add-teacher').on('click', addTeacher);
    $('#admin-table').on('click', '.remove', removeAdmin);
    $('#teacher-table').on('click', '.remove', removeTeacher);
    initAutoComplete();
  });

  var initAutoComplete = function() {
    var id = $('#organization-id').val();
    var url = '/organization/'+id+'/';

    $('#admin-ac').autocomplete({
      serviceUrl: url + 'admins',
      noCache: true,
      onSelect: function(e) {
        $('#admin-id').val(e.data);
      }
    });
    $('#teacher-ac').autocomplete({
      serviceUrl: url + 'teachers',
      noCache: true,
      onSelect: function(e) {
        $('#teacher-id').val(e.data);
      }
    });
  };

  /**
   * All methods for administrators
   * search
   * addition
   * deletion
   */
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
      addRow(res.data, 'admin');
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

  /**
   * All methods for teachers
   * search
   * addition
   * deletion
   */
  var addTeacher = function() {
    var id, userId, data;
    id = $('#organization-id').val();
    userId = $('#teacher-id').val();
    if (!userId) {
      return;
    }
    $('#teacher-ac').val('');
    $('#teacher-id').val('');
    data = { userId: userId };

    $.post('/organization/'+id+'/add-teacher', data).done(function(res) {
      addRow(res.data, 'teacher');
    }).error(function(err){
      console.log('error adding teacher');
    });
  };

  var removeTeacher = function(e) {
    e.preventDefault();
    var id = $('#organization-id').val();
    var userId = e.currentTarget.dataset.teacherId;
    var data = {userId:userId};
    console.log('Removing ...' + userId);

    $.post('/organization/'+id+'/remove-teacher', data).done(function(res) {
      // Remove row
      $(e.currentTarget.parentNode.parentNode).remove();
    }).error(function() {
      console.log('Error removing teacher');
    });
  };

  var addRow = function(data, type) {
    var tpl = '';
    tpl += '<tr><td>';
    tpl += '<a href="/profile/'+data.id+'">' + data.name + '</a></td>';
    tpl += '<td>' + data.email + '</td>';
    tpl += '<td><a class="remove" href="#" title="Remove" data-'+type+'-id="';
    tpl += data.id +'">';
    tpl += '<i class="fa fa-minus-square-o"></i></a></td>';
    tpl += '</tr>';

    $('#'+type+'-table>tbody').append(tpl);
  };


  /**
   * Other events for summernote plugin
   * and file uploading
   */
  var initSummernote = function(){
    var options = {
      height: 200,
      toolbar: [
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['fontsize', ['fontsize']],
        ['para', ['ul', 'ol']],
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
