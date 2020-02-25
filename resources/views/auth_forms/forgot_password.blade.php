@include('partials.header')
    <div class="forgot-password-area bg-image">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="forgot-password-content">
                    <div class="row m-0">
                        <div class="col-lg-5 p-0">
                            <div class="image">
                                <img src="{{ asset("assets/img/computer.png")}}" alt="image">
                            </div>
                        </div>

                        <div class="col-lg-7 p-0">
                            <div class="forgot-password-form">
                                <h2>Recover your password</h2>
                                <p class="mb-0">Please provide the email address that you used when you signed up for
                                    your {!! config('app.name') !!} account.</p>

                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                     @endif
                                <form method="POST" action="{{ route('password.email') }}">
                                    {{ csrf_field() }}
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                                        <input type="email" class="form-control" name="name"
                                            placeholder="Email address">
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                        <span class="label-title">
                                            <i class='bx bx-envelope'></i>
                                        </span>
                                    </div>
                                    <button type="submit" class="forgot-password-btn">Send Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Forgot Password Area -->
@include('partials.login_footer')