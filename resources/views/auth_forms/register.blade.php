@include('partials.header')
<body>
    <!-- Main Content Layout -->
    <!-- Start Register Area -->
    <div class="register-area bg-image">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="register-form">
                    <div class="logo">
                        <a href="../../index.html">
                            <img src="../../assets/img/logo.png" alt="image">
                        </a>
                    </div>

                    <h2>Register</h2>

                    <form method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" required autofocus>
                            <span class="label-title">
                                <i class='bx bx-user'></i>
                            </span>
                            @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required>
                            <span class="label-title">
                                <i class='bx bx-envelope'></i>
                            </span>
                            @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <span class="label-title">
                                <i class='bx bx-lock'></i>
                            </span>
                            @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="terms-conditions">
                                <label class="checkbox-box">I accept <a href="#">Terms and Conditions</a>
                                    <input type="checkbox">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="register-btn">Sign Up</button>

                        <p class="mb-0">Already have account? <a href="{{route('login')}}">Sign In</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Register Area -->

  @include('partials.login_footer')