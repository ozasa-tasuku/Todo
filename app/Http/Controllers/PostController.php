<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class PostController extends Controller
{
   public function index(Task $task)//インポートしたTaskをインスタンス化して$taskとして使用。
    {
        return $task->get();//$taskの中身を戻り値にする。
    } 
}
