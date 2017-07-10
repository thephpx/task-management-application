<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{

    // deletes a task
    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }
}
