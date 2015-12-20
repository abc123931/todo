<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>jQueryの練習</title>
</head>
<body>
    <p>jQueryの練習</p>

    <p>
        <input type="text" name="name" id="name">
        <input type="button" id="greet" value="Greet!">
    </p>
    <div id="result"></div>
  
    <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
    <script>
        $(function() {

            // Ajax
            // Asynchronous JavaScript + XML
            // サーバーと通信 + ページの書き換え
            // 非同期: 処理が終わる前に次の処理に移る
            // $.post
            // $.get

            $('#greet').click(function() {
                
                $.get('/ajax_practice/ajax', {
                    name: $('#name').val()
                }, function(data) {
                    $('#result').html(data.name);
                });

            });

        });
    </script>
</body>
</html>
