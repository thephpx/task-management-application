<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskSaveRequest;
use Illuminate\Http\Request;
use App\Task;

class TasksController extends Controller
{

    // saves a task
    public function store(TaskSaveRequest $request, $crew)
    {


        auth()->user()->publish(new Task([
            'type_id' => request('type_id'),
            'crew_id' => $crew,
            'room'    => request('room'),
            'amount'  => request('amount'),
            'start'   => request('start')
        ]));

        return back();

    }

    // deletes a task
    public function destroy(Task $task)
    {
        $task->delete();
        return back();
    }
}
