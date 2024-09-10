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
                <form action="/tasks/{{ $task->id }}/point" method="post">
                    @csrf
                    @method('PUT')
                    <input type="range" min="0" max="10" id="slider" value="{{ $task->point }}" name='task[point]'>
                    <span id="sliderValue">{{ $task->point }}</span>
                    <input type="submit" value="保存">
                </form>
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


    let ipt=document.getElementById("slider"); 

    let spn=document.getElementById("sliderValue"); 

    let rangeValue=function(ipt,spn){         

      return function(){                      

        spn.innerHTML=ipt.value;             

      }

    }

    ipt.addEventListener("input",rangeValue(ipt,spn));
    </script>
    </body>
</html>