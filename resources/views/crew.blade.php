@extends('baselayouts.base')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">{{$crew->name}} <small>{{$crew->persons}} persons, {{$crew->type}}</small></h2>
        </div>
    </div>

    @if(count($tasks))
        @foreach($tasks as $task)
            <div class="row task">
                <div class="col-sm-2">Room: {{$task->room}}</div>
                <div class="col-sm-2">{{$task->name}}</div>
                <div class="col-sm-2">{{$task->amount}} m2/m3</div>
                <div class="col-sm-2">{{$task->start}}</div>
                <div class="col-sm-2">{{$task->finish}}</div>
                <div class="col-sm-1">
                    @if($task->completed == 1)
                        finished
                    @endif
                </div>
                <div class="col-sm-1">
                    <a href="/tasks/destroy/{{$task->task_id}}" class="btn btn-sm delete-task">&#x2715;</a>
                </div>
            </div>
        @endforeach
    @else
        <div class="row">
            <div class="col-md-12">
                <h2>{{$crew->name}} <small>currently has no tasks</small></h2>
            </div>
        </div>
    @endif


@endsection