<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Todo</title>
    </head>
    <body>
       <h1 class="title">編集画面</h1>
         <div class="content">
         <form action="/tasks/{{ $task->id }}" method="POST">
            @csrf
            @method('PUT')
            <div class='content__title'>
                <h2>タイトル</h2>
                <input type='text' name='task[title]' value="{{ $task->title }}">
            </div>
            <div class='content__body'>
                <h2>本文</h2>
                <input type='text' name='task[body]' value="{{ $task->body }}">
            </div>
            <div class='content__due'>
                <input type='date' name='task[due_date]' value="{{$task->due_date}}"> 
                <input type='time' name='task[due_time]' value="{{$task->due_time}}">
            <div>
            <input type="submit" value="update"/>
        </form>
        <div class="footer">
            <a href="/tasks/{{$task->id}}">戻る</a>
        </div>
    </body>
</html>