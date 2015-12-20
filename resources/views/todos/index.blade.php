<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>My Todos</title>
  <link rel="stylesheet" href="{{url()}}/css/styles.css">
</head>
<body>
  <div id="container">
    <h1>Todos</h1>
    <form action="">
      <input type="text" id="new_todo" placeholder="What needs to be done?">
    </form>
    <ul id="todos">
      @foreach ($todos as $todo)
	      <li id="todo_{{$todo->id}}" data-id="{{$todo->id}}">
	        <input type="checkbox" class="update_todo" <?php if($todo->state === 1) {echo 'checked';}?>>
	        <span class="todo_title  <?php if($todo->state === 1) {echo 'done';}?>">{{$todo->title}}</span>
	        <div class="delete_todo">x</div>
	      </li>
      @endforeach
    </ul>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
  <script src="{{url()}}/js/todo.js"></script>
</body>
</html>
