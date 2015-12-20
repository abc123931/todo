$(function() {
  'use strict';

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

});
