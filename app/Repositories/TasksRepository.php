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
            ->select(DB::raw('room, amount, start, finish, tasks.id as task_id, types.name as type, crews.name as name'))
            ->leftJoin('types', 'tasks.type_id', '=', 'types.id')
            ->leftJoin('crews', 'tasks.crew_id', '=', 'crews.id')
            ->where('tasks.user_id', auth()->user()->id)
            ->orderBy('completed', 'asc')
            ->get();

        return $tasks;
    }

}