@extends('layouts.app')

@section('content')

    <div class="col-md-6 col-md-offset-3" style="margin-top: 60px; padding-left: 60px">
        <h1><b>Are you sure you want to delete your account?</b></h1>
        <p style="color: darkgrey">This will delete your account <i>{{auth()->user()->username}}</i> and all of its content.</p>
        <a href="{{route('home')}}" class="btn btn-primary " style="margin-top: 20px;margin-bottom: 15px">No, I dont want to do that</a>
        <div class="cleafix">
        </div>
        <a href="javascript:void(0);" id="delete_button" style="text-decoration: none;color: darkgrey; font-size: 12px" >I want to delete my account.</a>

        <div  id="delete_form" class="{{$errors->has('password') ? '' : 'hidden'}}">
            <hr>

            <form action="{{route('user.destroy',['id'=>Auth::user()->id])}}" method="POST">
                {{csrf_field()}}
                {{method_field('DELETE')}}
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="control-label">Password</label>


                        <input id="password" type="password" class="form-control" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif

                </div>


                <div class="form-group">
                    <button class="btn btn-primary">Delete my 9GAG account</button>
                </div>
            </form>

        </div>

    </div>



@endsection
@section('js')
    <script>
        $("#delete_button").click(function () {
            var state =$("#delete_form").removeClass("hidden");
        });
    </script>

@endsection