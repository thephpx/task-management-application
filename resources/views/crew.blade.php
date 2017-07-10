@extends('baselayouts.base')
@section('title')
    {{$crew->name}}'s tasks
@endsection

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
                <div class="col-sm-2"><a href="/tasks/show/{{$task->name}}">{{$task->name}}</a></div>
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
                <h2>{{$crew->name}} <small>currently has no tasks</small></h2>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-md=12">
            <form class="form-inline" method="post" action="/tasks/store/{{$crew->id}}" id="addTask">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type_id">
                        @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Room</label>
                    <input class="form-control" name="room" type="text" value="{{old('room')}}">
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input class="form-control" name="amount" type="text" value="{{old('amount')}}">
                </div>
                <div class="form-group">
                    <label>Start</label>
                    <input class="form-control" name="start" type="text" value="{{old('start')}}" id="startDate">
                </div>
                <button type="submit" class="btn btn-default btn-sm">Add</button>
            </form>
            @include('baselayouts.errors')
        </div>
    </div>


@endsection

@section('footer')
    <script>
        $(document).ready(function(){
            $('#startDate').flatpickr({
                altInput:true,

            });
        })
    </script>
@endsection