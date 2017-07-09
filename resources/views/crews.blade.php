@extends('baselayouts.base')

@section('content')

    <div class="row">
        <div class="col-md-12">
            <h2 class="page-header">You've got {{count($crews)}} crews</h2>
        </div>
    </div>

    <div id="crewsTable">
        @if(count($crews))
            @foreach($crews as $crew)
                <a href="/crews/{{$crew->name}}">
                <div class="row crew">
                    <div class="col-sm-3 text-left">{{$crew->name}}</div>
                    <div class="col-sm-3 text-center">{{$crew->persons}}</div>
                    <div class="col-sm-6 text-center">{{$crew->type}}</div>
                </div>
                </a>
            @endforeach
        @endif
    </div>


    <div class="row" id="addCrew">
        <div class="col-md-12">
            @include('baselayouts.errors')
            <form class="form-inline" method="post" action="/crews">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Title for the crew" value="{{old('name')}}" required>
                </div>
                <div class="form-group">
                    <label>Number</label>
                    <input type="text" class="form-control" name="persons" placeholder="The number of fuckers" value="{{old('persons')}}" required>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" class="form-control" name="type" placeholder="Type of work" value="{{old('type')}}" required>
                </div>
                <button type="submit" class="btn btn-default">Create</button>
            </form>
        </div>
    </div>

@endsection