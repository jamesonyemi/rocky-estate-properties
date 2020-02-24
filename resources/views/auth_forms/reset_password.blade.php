
@include('partials.header')
            <!-- Start Reset Password Area -->
    <div class="reset-password-area bg-image">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="reset-password-content">
                    <div class="row m-0">
                        <div class="col-lg-5 p-0">
                            <div class="image">
                                <img src="{{ asset('assets/img/computer.png') }}" alt="image">
                            </div>
                        </div>
                        <div class="col-lg-7 p-0">
                            <div class="reset-password-form">
                                <h2>Reset Your Password</h2>
                                <form method="POST" action="{{ route('password.request') }}">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="token" value="{{ $token }}">
                                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                        <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                            <span class="label-title">
                                                <i class='bx bx-envelope'></i>
                                            </span>
                                    </div>
                                    <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                        <input id="password" type="password" class="form-control" id="password" name="password"  placeholder="Enter a new password" required>
                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                            <span class="label-title">
                                                <i class='bx bx-lock'></i>
                                            </span>
                                    </div>

                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                        <input id="password-confirm" type="password" class="form-control" placeholder="Confirm your new password" name="password_confirmation" required>

                                            @if ($errors->has('password_confirmation'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password_confirmation') }}</strong>
                                                </span>
                                            @endif
                                        <span class="label-title">
                                            <i class='bx bx-lock-alt'></i>
                                        </span>
                                    </div>

                                    <button type="submit" class="reset-password-btn">Reset my Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Reset Password Area -->
@include('partials.login_footer')
