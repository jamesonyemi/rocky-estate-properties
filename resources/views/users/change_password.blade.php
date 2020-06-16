@include('partials.master_header')
    <br><br><br>
        <!-- Start -->
        <div class="card mb-30 mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Reset User Password</h3>
            </div>
            <div class="card-body">
           @foreach ($verifiedUsers as $v_user)
                <?php $encryptId = Crypt::encrypt($v_user->id);  ?>
            <form class="mt-5" action="{{ route('verified-users.update', $encryptId) }}" method="POST">
                    {{ csrf_field() }}
                    @method("PUT")
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name">First Name</label>
                        <input type="text" class="form-control" value="{{ old('first_name', $v_user->first_name) }}" name="first_name" id="first_name" required>
                            @if ($errors->has('first_name'))
                            <span class="help-block"><strong>{{ $errors->first('first_name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control" value="{{ old('middle_name', $v_user->middle_name) }}" name="middle_name" id="middle_name" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4 {{ $errors->has('last_name') ? ' has-error' : '' }} ">
                            <label for="last_name">Last Name</label>
                        <input type="text" class="form-control" value="{{ old('last_name', $v_user->last_name) }}" name="last_name" id="last_name" required>
                                 @if ($errors->has('last_name'))
                                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                                 @endif
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4 {{ $errors->has('email') ? ' has-error' : '' }} ">
                            <label for="email">Email</label>
                        <input type="email" class="form-control" value="{{ old('email', $v_user->email) }}" name="email" id="email" required>
                            @if ($errors->has('email'))
                            <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4" >
                            <label for="pwd">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="badge badge-pill badge-danger" id="error-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                            <span class="badge badge-pill badge-success" id="success-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="email">Comfirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                            <span class="badge badge-pill badge-danger" id="error-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                            <span class="badge badge-pill badge-success" id="success-msg" style="display:none; float:right; margin-top: 2.5px;" value="" ></span>
                        </div>
                    </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col-1"></div>
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                   Save Changes</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                      @endforeach
                </form>
            </div>
        </div>
        <!-- End -->
        <div class="flex-grow-1"></div>
 @include('partials.footer')
</div>

<script>
    ( function () {

        let password    = $('input[name="password"]');
        let confirmPwd  = $('input[name="password_confirmation"]');
        let error       = $('#error-msg');
        let success     = $('#success-msg');
        let saveButton  = $('button[type="submit"]');

    confirmPwd.on('keypress,keyup, keydown, change', function () {
        if ( confirmPwd.val() === password.val() ) {

            let accepted = function () {
                success.show();
                error.hide();
                saveButton.removeAttr("disabled","disabled");
                AlertMsg(success, "\n"+ "Accepted");
            }
            return accepted();
        }

            if (  confirmPwd.val() !== password.val()  ) {

                let rejected = function () {
                    success.hide();
                    error.show();
                    saveButton.attr("disabled","disabled");
                    AlertMsg(error, "\n"+ "Password mis-match");
                }
                return rejected();
            }

            // let comparePwd  =   ( password.val() === confirmPwd.val() ? accepted() : rejected() );
         });

    password.on('keypress,keyup, keydown, change', function () {
        if ( password.val() === confirmPwd.val()   ) {

            let accepted = function () {
                success.show();
                error.hide();
                saveButton.removeAttr("disabled","disabled");
                AlertMsg(success, "\n"+ "Accepted");
            }
            return accepted();
        }

            if (  password.val() !== confirmPwd.val()  ) {

                let rejected = function () {
                    success.hide();
                    error.show();
                    saveButton.attr("disabled","disabled");
                    AlertMsg(error, "\n"+ "Password mis-match");
                }
                return rejected();
            }

            // let comparePwd  =   ( password.val() === confirmPwd.val() ? accepted() : rejected() );
         });

    })();

    function AlertMsg(params, msg) {
        let targetElement = params;
        let msgContent    = targetElement.textContent;
        let msgText       = targetElement.val(targetElement.text(msg));
        msgContent        = msgText;
    };
</script>