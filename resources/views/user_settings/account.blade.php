@extends('layouts.app')

@section('content')
    @include('user_settings/left_navbar')

    <div class="col-md-5">
        <h2><b>Account</b></h2>
        <div class="box-body">
            {!! Form::model($user,['route'=>['user.updateAccount',$user->id],'method'=>'PATCH']) !!}
            {{--<form action="{{route('user.updateAccount')}}" method="POST">--}}
                {{--{{csrf_field()}}--}}
                {{--{{method_field('PATCH')}}--}}

            <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
                <label for="username">Username</label>
                <input id="username" type="text" class="form-control" name="username" value="{{Auth::user()->username}}">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('username'))
                    <span class="help-block">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                @endif
                {{--<p class="settParagraphs" style="margin-top: 2px; color: lightslategrey">{{route('user.profile',['username'=>Auth::user()->username])}}</p>--}}
            </div>

            <div class="form-group has-feedback {{ $errors->has('email') ? 'has-error' : '' }}">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control" name="email" value="{{ Auth::user()->email }}">

                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if ($errors->has('email'))
                    <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                @endif
                <p class="settParagraphs" style="margin-top: 2px; color: lightslategrey">Email will not be displayed publicly</p>
            </div>


            <label for="checkbox" style="margin-bottom: 10px">Upvote</label>
            <div class="form-group">
                <input type="hidden" name="hide_upvotes" value="0" >
                {{Form::checkbox('hide_upvotes')}}

                Hide my upvotes in profile

            </div>

            <div class="form-group">
                <div class="col-xs-6" style="margin-left: -15px; margin-top: 17px">
                    <button type="submit" class="btn btn-primary" style="background-color: deepskyblue; border-radius: 0; border:none">
                        <b>Save changes</b>
                    </button>
                </div>
            </div>

            {{--</form>--}}
            {!! Form::close() !!}
            <div class="clearfix">

            </div>

            <div class="col-xs-6" style="margin-left:-13px; margin-top:40px; ">
                <a class="" href="{{route('member.delete')}}" style="text-decoration:none; color: deepskyblue">Delete my account</a>
            </div>


        </div>
    </div>

@endsection
