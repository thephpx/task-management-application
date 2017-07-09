@extends('baselayouts.base')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <h2 class="page-header">You've got COUNT crews</h2>
        </div>
    </div>

    @if(count($crews))
        @foreach($crews as $crew)
            <div class="row crew">
                <div class="col-sm-3 text-center">{{$crew->name}}</div>
                <div class="col-sm-3 text-center">{{$crew->persons}}</div>
                <div class="col-sm-3 text-center">{{$crew->type}}</div>
            </div>
        @endforeach
    @endif

    <div class="row" id="addCrew">
        <div class="col-md-8 col-md-offset-2">
            <form class="form-inline" method="post" action="/crews">
                {{csrf_field()}}
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="Title for the crew" value="{{old('name')}}" required>
                </div>
                <div class="form-group">
                    <label>Numbers</label>
                    <input type="text" class="form-control" name="persons" placeholder="The number of fuckers" value="{{old('persons')}}" required>
                </div>
                <div class="form-group">
                    <label>Type</label>
                    <input type="text" class="form-control" name="type" placeholder="Type of work" value="{{old('type')}}" required>
                </div>
                <button type="submit" class="btn btn-default" id="createCrew">Create</button>
            </form>
        </div>
    </div>

@endsection