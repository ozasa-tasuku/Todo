<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Todo</title>
        <link rel="stylesheet" href="/css/createstyle.css">
    </head>
    <body>
        <h1>Task作成</h1>
        <hr class="line">
        <form action="/tasks" method="POST">
            @csrf
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="task[title]" placeholder="タイトル"/>
            </div>
            <div class="body">
                <h2>内容</h2>
                <textarea name="task[body]" placeholder="課題、約束等"></textarea>
            </div>
            <div class="due">
                <input type="date" name="task[due_date]"> <input type="time" name="task[due_time]">
            <div>
            <input type="submit" value="store"/>
        </form>
        <hr class="line">
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>