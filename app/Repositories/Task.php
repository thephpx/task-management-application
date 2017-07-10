<?php

namespace App\Repositories;

use Carbon\Carbon;
class Task
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

}