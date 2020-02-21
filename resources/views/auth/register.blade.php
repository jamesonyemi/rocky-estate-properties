    @include('partials.header')
    <body>
        <!-- Main Content Layout -->
        <!-- Start Register Area -->
        <div class="register-area bg-image">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="register-form">
                        <div class="logo">
                            <a href="#">
                                <img src="{{ asset('assets/img/logo.png') }}" alt="image">
                            </a>
                        </div>

                        <h2>Register</h2>

                        <form method="POST" action="{{ route('register') }}">
                            {{ csrf_field() }}
                            <div class="form-group {{ $errors->has('fname') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="fname" placeholder="First Name" value="{{ old('fname') }}" required autofocus>
                                <span class="label-title">
                                    <i class='bx bx-user'></i>
                                </span>
                                @if ($errors->has('fname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('fname') }}</strong>
                                        </span>
                                    @endif
                            </div>
                            <div class="form-group {{ $errors->has('oname') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="oname" placeholder="Middle Name" value="{{ old('oname') }}" required >
                                <span class="label-title">
                                    <i class='bx bx-user'></i>
                                </span>
                                @if ($errors->has('oname'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('oname') }}</strong>
                                </span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->has('lname') ? ' has-error' : '' }}">
                                <input type="text" class="form-control" name="lname" placeholder="Last Name" value="{{ old('lname') }}" required >
                                <span class="label-title">
                                    <i class='bx bx-user'></i>
                                </span>
                                @if ($errors->has('lname'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('lname') }}</strong>
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
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                <span class="label-title">
                                    <i class='bx bx-lock'></i>
                                </span>
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