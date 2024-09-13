<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Todo リスト</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="./css/indexstyle.css">    
    
    </head>
    <body class="antialiased">
        <h1>Todo リスト</h1>
        <div class='btn'>
            <a href='/tasks/create'>create</a>
        </div>
        <hr class="line">
        <div class='tasks'>
            @foreach ($tasks as $task)
            <div class='task'>
                <h2 class='title'>
                    <a href="/tasks/{{ $task->id }}">{{ $task->title }}</a>
                </h2>
                <p class='body'>{{ $task->body }}</p>
                <p class='due'>期限 {{ $task->due_date }} {{ $task->due_time }}</p>
                <hr class="line">
            </div>
            @endforeach
            ユーザー：{{ Auth::user()->name }}
        </div>
    </body>
</html>