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
    
    public function edit(Task $task)
    {
        return view('tasks.edit')->with(['task' => $task]);
    }
    
    public function update(Request $request, Task $task)
    {
        $input_task = $request['task'];
        $task->fill($input_task)->save();

        return redirect('/tasks/' . $task->id);
    }
    
    public function delete(Task $task)
    {
        $task->delete();
        return redirect('/');
    }
    
   public function point(Request $request, Task $task)
    {
        $input_task = $request['task'];
        $task->point=$input_task['point'];
        $task->save();

        return redirect('/tasks/' . $task->id);
    } 
}
