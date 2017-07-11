@extends('baselayouts.base')
@section('title')
    {{auth()->user()->name}}'s tasks
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">{{auth()->user()->name}}'s tasks</h2>
        </div>
    </div>

    @if(count($tasks))
        @foreach($tasks as $task)
            <div class="row task">
                <div class="col-sm-2">Room: {{$task->room}}</div>
                <div class="col-sm-2"><a href="/tasks/show/{{$task->type_id}}">{{$task->name}}</a></div>
                <div class="col-sm-2">{{$task->amount}} m2/m3</div>
                <div class="col-sm-2">Start: {{$task->start}}</div>
                <div class="col-sm-2">
                    @if($task->completed == 1)
                        Day(s) spent: <strong>{{$task->finish}}</strong>
                    @endif
                </div>
                @if($task->completed == 0)
                    <div class="col-sm-2">
                        <a href="/tasks/finish/{{$task->task_id}}" class="btn btn-default btn-sm action-task">Finish</a>
                    </div>
                @else
                    <div class="col-sm-2">
                        <a href="/tasks/destroy/{{$task->task_id}}" class="btn btn-danger btn-sm action-task">Delete</a>
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
