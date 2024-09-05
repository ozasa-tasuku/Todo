<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Todo リスト</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body class="antialiased">
        <h1>Todo リスト</h1>
        <div class='tasks'>
            @foreach ($tasks as $task)
            <div class='task'>
                <h2 class='title'>{{ $task->title }}</h2>
                <p class='body'>{{ $task->body }}</p>
                <p class='due'>期限 {{ $task->due_date }} {{ $task->due_time }}</p>
            </div>
            @endforeach
        </div>
    </body>
</html>
