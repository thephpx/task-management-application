@extends('baselayouts.base')

@section('content')

    <section id="signup">
        <div class="row">
            <div class="col-md-6 col-md-offset-2">
                <h2 class="page-header">Sign UP</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-md-offset-2">

                @include('baselayouts.errors')

                <form class="form-horizontal" action="/register" method="post">

                    {{csrf_field()}}

                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Name:</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{old('name')}}"required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Email:</label>
                        <div class="col-lg-10">
                            <input type="email" class="form-control" name="email" placeholder="Your Email" value="{{old('email')}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Password:</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password" placeholder="Your Password">
                        </div>
                    </div>
                    <div class="form-group">
                        <label  class="col-lg-2 control-label">Confirmation:</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Please confirm your password">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                            <button type="submit" class="btn btn-default pull-right">Join!</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection