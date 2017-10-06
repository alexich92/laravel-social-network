@inject('countries','App\Http\Utilities\Country')
@extends('layouts.app')
@section('css')
    <style>
        option:nth-child(n) {
            font-weight:bold;
        }
    </style>
    @endsection


@section('content')
    @include('user_settings/left_navbar')


    <div class="col-md-6">
        <h1><b>Profile</b></h1>
        {{--{!! Form::model($user, ['method'=>'PATCH', 'action'=> ['UserSettingsController@updateProfile', $user->id],'files'=>true]) !!}--}}
        {{--<form action="{{route('user.updateProfile')}}" method="POST" enctype="multipart/form-data">--}}
            {{--{{csrf_field()}}--}}
            {{--{{method_field('PATCH')}}--}}
            {{--<div class="row">--}}
            {{--<div class="form-group col-xs-2">--}}
                {{--<label for="avatar">Avatar</label>--}}
                {{--<img src="/images/avatars/{{$user->avatar}}" alt=""  width="80px" style="border-radius:5%">--}}
            {{--</div>--}}
            {{--<div class=" form-group col-xs-5" id="chooseFile" style="margin-top: 25px">--}}
                {{--<input type="file" name="avatar" style="padding-top: 10px">--}}
                {{--@if ($errors->has('avatar'))--}}
                    {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('avatar') }}</strong>--}}
                        {{--</span>--}}
                {{--@endif--}}
                {{--<p style="color: darkgrey; font-size: 12px; padding-top: 3px">JPG, GIF or PNG, Max size: 2MB</p>--}}
                {{--<a href="#">Random</a>--}}

            {{--</div>--}}
        {{--</div>--}}
            {{--<div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">--}}
                {{--<label for="name">Your name</label>--}}
                {{--<input type="text" name="name" value="{{$user->name}}" class="form-control">--}}
                 {{--<span class="glyphicon glyphicon-user form-control-feedback"></span>--}}
                   {{--@if ($errors->has('name'))--}}
                        {{--<span class="help-block">--}}
                            {{--<strong>{{ $errors->first('name') }}</strong>--}}
                        {{--</span>--}}
                   {{--@endif--}}
                    {{--<p class="settParagraphs">This is the name that will be visible to other users on 9GAG.</p>--}}
            {{--</div>--}}

        {{--<label for="selectpicker">Gender</label>--}}
        {{--<div class="form-group">--}}
            {{--<select name="gender" id="gender" style="height: 40px; font-weight: bold">--}}
                {{--<option value="">Select your gender</option>--}}
                {{--<option value="1">Male</option>--}}
                {{--<option value="0">Female</option>--}}
            {{--</select>--}}
        {{--</div>--}}




        {{--<div class="form-group has-feedback {{ $errors->has('birthday') ? 'has-error' : '' }}">--}}
            {{--<label for="birthday">Birthday</label>--}}
            {{--<input type="date" class="form-control" name="birthday" value="{{$user->birthday}}">--}}
            {{--@if ($errors->has('birthday'))--}}
                {{--<span class="help-block">--}}
                    {{--<strong>{{ $errors->first('birthday') }}</strong>--}}
                {{--</span>--}}
            {{--@endif--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--<label for="country">Country</label>--}}
            {{--<select name="country" class="form-control">--}}
                {{--@foreach(array_flip($countries->all()) as $key=>$country)--}}
                    {{--<option value="{{$key}}">{{$country}}</option>--}}
                {{--@endforeach--}}
            {{--</select>--}}

            {{--<p class="settParagraphs">Tell us where you're from so we can provide better service for you.</p>--}}
        {{--</div>--}}




        {{--<div class="form-group">--}}
            {{--<label for="description">Tell people who you are</label>--}}
            {{--<textarea name="description" class="form-control" rows="4" placeholder="My funny collection" style="resize:none">{{$user->description}}</textarea>--}}
        {{--</div>--}}



        {{--<button type="submit" class="btn btn-primary">Save changes</button>--}}


        {{--</form>--}}

    {{--</div>--}}




            {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['UserSettingsController@updateProfile', $user->id],'files'=>true]) !!}

            <div class="row">
                <div class="form-group col-xs-2">
                    {!! Form::label('avatar', 'Avatar:') !!}
                    <img src="/images/avatars/{{$user->avatar}}" alt=""  height="70px" width="80px" style="border-radius:5%">
                </div>
                <div class=" form-group col-xs-5" id="chooseFile" style="margin-top: 25px">
                    {!! Form::file('avatar', null, ['class'=>'form-control'])!!}
                    @if ($errors->has('avatar'))
                        <span class="help-block">
                            <strong>{{ $errors->first('avatar') }}</strong>
                        </span>
                    @endif
                    <p style="color: darkgrey; font-size: 12px; padding-top: 5px">JPG, GIF or PNG, Max size: 2MB</p>
                    <a href="#">Random</a>

                </div>
            </div>

            <div class="form-group has-feedback {{ $errors->has('name') ? 'has-error' : '' }}">
                {!! Form::label('name', 'Your Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control'])!!}
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if ($errors->has('name'))
                    <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                @endif
                <p class="settParagraphs">This is the name that will be visible to other users on 9GAG.</p>
            </div>

            <label for="selectpicker">Gender</label>
            <div class="form-group">
                {!!Form::select('gender',
                        [""=>'Select your gender','1' => 'Male', '0' => 'Female'],
                        null,
                        [Auth::user()->gender != null ? "disabled" : ""])
                 !!}
            </div>


            <div class="form-group has-feedback {{ $errors->has('birthday') ? 'has-error' : '' }}">
                {!! Form::label('birthday', 'Birthday:') !!}
                {!! Form::date('birthday', null, ['class'=>'form-control'])!!}
                @if ($errors->has('birthday'))
                    <span class="help-block">
                            <strong>{{ $errors->first('birthday') }}</strong>
                </span>
                @endif
            </div>

            <div class="form-group">
                <label for="country">Country</label>
                <?php $countrylist = $countries->all(); ?>
                {!! Form::select('country', array_flip($countrylist), null, ['class' => 'form-control']) !!}

                <p class="settParagraphs">Tell us where you're from so we can provide better service for you.</p>
            </div>




            <div class="form-group">
                <label for="description">Tell people who you are</label>
                <textarea name="description" id="description" class="form-control"  style="resize: none"  rows="4">{{$user->description}}</textarea>
            </div>



            <button type="submit"
                    class="btn btn-primary"
            >Save changes</button>


            {!! Form::close() !!}

        </div>








@endsection