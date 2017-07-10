<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskSaveRequest;
use Carbon\Carbon;
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


    // set task as finished
    public function edit(Task $task)
    {

        $task->completed = 1;

        $task->finish    = Carbon::today()->toDateString();

        $task->save();

        return back();

    }
}
