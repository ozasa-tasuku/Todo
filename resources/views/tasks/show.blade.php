<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Task詳細</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/showstyle.css') }}">
    </head>
    <body>
        <h2>Task詳細</h2>
        <hr class="line">
        <h1 class="title">
            {{ $task->title }}
        </h1>
        <div class="due">
            <span class="box-title">期限</span>
            <p>{{ \Carbon\Carbon::parse($task->due_date . ' ' . $task->due_time)->format('Y年n月j日 H:i') }}</p>
        </div>
        <div class="content">
            <div class="content__task">
                <h3>内容</h3>
                <p>{{ $task->body }}
                    
                </p>
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
            <a href="/tasks/{{ $task->id }}/edit">repeat</a>
        </div>
        <form action="/tasks/{{ $task->id }}" id="form_{{ $task->id }}" method="post">
        @csrf
        @method('DELETE')
        <button type="button" onclick="deleteTask({{ $task->id }})">delete</button> 
        </form>
        <hr class="line">
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