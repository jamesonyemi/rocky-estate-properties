@include('partials.header')
<body>
    <!-- Main Content Layout -->
    <!-- Start Login Area -->
    <div class="login-area bg-image">
        <div class="d-table">
            <div class="d-table-cell">
                <div class="login-form">
                    <div class="logo">
                        <a href="#">
                            <img src=" {{ asset('assets/img/logo.png" alt="image') }}">
                        </a>
                    </div>

                    <h2>Welcome</h2>

                    <form method="POST" action="{{ route('login') }}">
                        {{csrf_field()}}
                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required autofocus>
                            <span class="label-title">
                                <i class='bx bx-user'></i>
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
                            <div class="remember-forgot">
                                <label class="checkbox-box">Remember me
                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="checkmark"></span>
                                </label>
                                <a href="{{ route('password.request') }}" 
                                class="forgot-password">Forgot password?</a>
                            </div>
                        </div>

                        <button type="submit" class="login-btn">Login</button>

                        <p class="mb-0">Don’t have an account? <a href="{{ route('register') }}">Sign Up</a></p>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Login Area -->

    @include('partials.login_footer')