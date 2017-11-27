<div class="modal" tabindex="-1" id="loginModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button style="font-size: 35px" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal-title" style="padding-top: 20px">Login</h2>

            </div>
            <div class="modal-body">
                <p>Log in with your email address</p>

                <form id="loginForm" class="form-horizontal" method="POST" action="{{ route('user.login') }}">
                    {{--{{ csrf_field() }}--}}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" style="margin-left: 40px; margin-bottom: 3px;" class="control-label">E-Mail Address</label>

                        <div class="col-md-11">
                            <input style="margin-left: 25px" id="email" type="email" class="form-control" name="email" required autofocus>

                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label style="margin-left: 40px;margin-bottom: 3px;" for="password" class="control-label">Password</label>

                        <div class="col-md-11">
                            <input style="margin-left: 25px" id="password" type="password" class="form-control" name="password" required>

                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <p style="margin-left: 40px;color: red; font-weight: bold" class="wth"></p>
                    </div>
                    <hr>

                    <div class="form-group">
                        <div class="col-md-11">
                            <button style="margin-left: 25px"  class="btn btn-primary login pull-left">
                                Login
                            </button>

                            <a style="margin-right: -40px" class="btn btn-link pull-right" href="{{ route('password.request') }}">
                                Forgot Your Password?
                            </a>
                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>