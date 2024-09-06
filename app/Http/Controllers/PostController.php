<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class PostController extends Controller
{
   public function index()
   {
       $tasks = Task::all();
        return view('tasks.index')->with('tasks', $tasks);   
   }
   
   public function show(Task $task)
    {
        return view('tasks.show')->with(['task' => $task]);
        //'post'はbladeファイルで使う変数。中身は$postはid=1のPostインスタンス。
    }
    public function create()
    {
        return view('tasks.create');
    }
    public function store(Request $request, Task $task)
    {
        $input = $request['task'];
        $task->fill($input)->save();
        return redirect('/tasks/' . $task->id);
    }
}
