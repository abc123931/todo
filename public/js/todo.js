$(function() {
  'use strict';

  $("#new_todo").focus();

  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

  // update
  $('#todos').on('click', '.update_todo', function() {
    // idを取得
    var id = $(this).parents('li').data('id');
    // ajax処理
    $.post('/ajax', {
      id: id,
      mode: 'update'
    }, function(res) {
      console.log(res.title);
      if (res.state === 1) {
        $('#todo_' + id).find('.todo_title').addClass('done');
      } else {
        $('#todo_' + id).find('.todo_title').removeClass('done');
      }
    });
  });



  // create
  $('#new_todo_form').on('submit', function() {
    // titleを取得
    var title = $("#new_todo").val();
    // ajax処理
    $.post('/ajax', {
      title: title,
      mode: 'create'
    }, function(res) {
        var $li = $("#todo_template").clone();

        $li
            .attr('id', 'todo_' + res.id)
            .data('id', res.id)
            .find('.todo_title').text(title);

        $("#todos").prepend($li.fadeIn());
        $("#new_todo").val('').focus();
    });
    return false;
  });



  // delete
  $('#todos').on('click', '.delete_todo', function() {
    // idを取得
    var id = $(this).parents('li').data('id');
    // ajax処理
    if (confirm('are you sure?')) {
        $.post('/ajax', {
      id: id,
      mode: 'delete'
    }, function() {
      $('#todo_' + id).fadeOut(800);
    });
    };
  });

});
