<div class="modal" tabindex="-1" id="registerModal" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button style="font-size: 35px" type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h2 class="modal-title" style="padding-top: 20px; margin-left:150px">Become a member</h2>

            </div>
            <div class="modal-body">
                <form id="registerForm" class="form-horizontal" method="POST" action="{{ route('user.register') }}">
                    {{csrf_field()}}
                    <div class="form-group">
                        <label for="name" style="margin-left: 40px; margin-bottom: 3px;" class="control-label">Full name</label>
                        <div class="col-md-11">
                            <input style="margin-left: 25px" id="name"  class="form-control" name="name" required autofocus>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="email" style="margin-left: 40px; margin-bottom: 3px;" class="control-label">Email</label>
                        <div class="col-md-11">
                            <input style="margin-left: 25px" type="email" class="form-control email" name="email" required autofocus>
                        </div>
                    </div>



                    <div class="form-group">
                        <label style="margin-left: 40px;margin-bottom: 3px;" for="password" class="control-label">Password</label>
                        <div class="col-md-11">
                            <input style="margin-left: 25px" id="pass" type="password" class="form-control" name="password" required>
                        </div>
                    </div>

                    <div style="margin: 20px 0px 0px 25px" class="g-recaptcha" data-sitekey="{{env('GOOGLE_RECAPTCHA_KEY')}}"></div>
                    <div class="print-error-msg" style="display:none">
                        <ul style="list-style-type: none; color: red;margin-left:-15px">></ul>
                    </div>
                    <hr>

                    <div class="form-group">
                        <div class="col-md-11">
                            <button style="margin-left: 25px"  class="btn btn-primary register pull-left">
                                Sign Up
                            </button>

                        </div>
                    </div>
                </form>


            </div>
        </div>
    </div>
</div>