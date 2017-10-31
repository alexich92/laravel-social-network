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

        {!! Form::model($user, ['method'=>'PATCH', 'action'=> ['UserSettingsController@updateProfile', $user->id],'files'=>true]) !!}

            <div class="row">
                <div class="form-group col-xs-2 user_image">
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
                    <a id="random" href="javascript:void(0)">Random</a>

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
        <input type="hidden" id="user" value="{{$user->id}}">
        </div>

@endsection

@section('js')
    <script>
        $("#random").click(function(){
            $.ajax({
                method:'GET',
                url:'/random',
                dataType: 'json',
                success:function(data){
                    if(!data.error){
                        $(".user_image img").prop('src','/images/profile_images/' + data);
                    }
                }
            })
        })
    </script>
@endsection