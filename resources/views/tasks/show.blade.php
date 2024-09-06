<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="title">
            {{ $task->title }}
        </h1>
        <div class="content">
            <div class="content__task">
                <h3>内容</h3>
                <p>{{ $task->body }}</p>
                <h3>期限</h3>
                <p class='due'>{{ $task->due_date }} {{ $task->due_time }}</p>
            </div>
        </div>
        <div class="edit">
            <a href="/tasks/{{ $task->id }}/edit">edit</a>
        </div>
        <form action="/tasks/{{ $task->id }}" id="form_{{ $task->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="button" onclick="deleteTask({{ $task->id }})">delete</button> 
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
        <script>
    function deleteTask(id) {
        'use strict'

        if (confirm('削除すると復元できません。\n本当に削除しますか？')) {
            document.getElementById(`form_${id}`).submit();
        }
    }
    </script>
    </body>
</html>