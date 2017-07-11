<?php

namespace App\Repositories;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class TasksRepository
{

    public static function combineTaskWithTypes($tasks)
    {
        foreach($tasks as $task){
            $start = new Carbon($task->start);
            $finish = new Carbon($task->finish);
            $task->start = $start->toFormattedDateString();;
            $task->finish = $finish->diffInDays($start->copy());
        }

        return $tasks;
    }

    public static function getUserTasks()
    {
        $tasks = DB::table('tasks')
            ->select(DB::raw('*, tasks.id as task_id'))
            ->leftJoin('types', 'tasks.type_id', '=', 'types.id')
            ->where('user_id', auth()->user()->id)
            ->orderBy('completed', 'asc')
            ->get();

        return $tasks;
    }

}