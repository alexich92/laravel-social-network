@extends('layouts.app')

@section('content')
    @include('user_settings/left_navbar')

    <div class="col-md-6">
        <h2><b>Password</b></h2>
        <form action="" method="POST">
            {{csrf_field()}}
            {{method_field('PATCH')}}

        <div class="box-body">

            <div class="form-group has-feedback {{ $errors->has('old_password') ? 'has-error' : '' }}">
                <label for="old_password">Old password</label>
                <input id="old_password" type="password" class="form-control" name="old_password">

                <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                @if ($errors->has('old_password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('old_password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('new_password') ? 'has-error' : '' }}">
                <label for="new_password">New password</label>
                <input id="new_password" type="password" class="form-control" name="new_password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('new_password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('new_password') }}</strong>
                    </span>
                @endif
            </div>

            <div class="form-group has-feedback {{ $errors->has('confirm_password') ? 'has-error' : '' }}">
                <label for="confirm_password">Confirm password</label>
                <input id="confirm_password" type="password" class="form-control" name="confirm_password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if ($errors->has('confirm_password'))
                    <span class="help-block">
                            <strong>{{ $errors->first('confirm_password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <button type="submit"
                class="btn btn-primary"
        >Save changes</button>
        </form>

    </div>
@endsection


