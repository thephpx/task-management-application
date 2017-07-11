@extends('baselayouts.base')
@section('title')
    Ongoing tasks
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">Ongoing tasks</h2>
       </div>
    </div>
    @if(count($current_tasks))
        @foreach($current_tasks as $current_task)
            <div class="row task">
                <div class="col-sm-1">R: {{$current_task->room}}</div>
                <div class="col-sm-2">Crew: {{$current_task->name}}</div>
                <div class="col-sm-1"><a href="/tasks?type={{$current_task->type}}">{{$current_task->type}}</a></div>
                <div class="col-sm-2">{{$current_task->amount}} m2/m3</div>
                <div class="col-sm-2">Start: {{$current_task->start}}</div>
                <div class="col-sm-2">
                    @if($current_task->completed == 1)
                        Day(s) spent: <strong>{{$current_task->finish}}</strong>
                    @endif
                </div>
                @if($current_task->completed == 0)
                    <div class="col-sm-2">
                        <a href="/tasks/finish/{{$current_task->task_id}}" class="btn btn-default btn-sm action-task">Finish</a>
                    </div>
                @endif
            </div>
        @endforeach
    @else
        <div class="row">
            <div class="col-md-12">
                <h2>{{auth()->user()->name}} <small>currently has no tasks</small></h2>
            </div>
        </div>
    @endif


@endsection