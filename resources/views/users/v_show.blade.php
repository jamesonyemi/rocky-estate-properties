@include('partials.master_header')
    <br><br><br>
        <!-- Start -->
        <div class="card mb-30 mt-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>View User Details</h3>
            </div>
            <hr>
            <div class="card-body">
           @foreach ($verifiedUsers as $v_user)
                <?php $encryptId = Crypt::encrypt($v_user->id);  ?>
            <form class="mt-5" action="{{ route('verified-users.show', $encryptId) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4 {{ $errors->has('first_name') ? ' has-error' : '' }}">
                            <label for="first_name">First Name</label>
                        <input type="text" class="form-control list-group-item" value="{{ old('first_name', $v_user->first_name) }}" name="first_name" id="first_name" disabled>
                            @if ($errors->has('first_name'))
                            <span class="help-block"><strong>{{ $errors->first('first_name') }}</strong></span>
                            @endif
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="middle_name">Middle Name</label>
                        <input type="text" class="form-control list-group-item" value="{{ old('middle_name', $v_user->middle_name) }}" name="middle_name" id="middle_name" disabled >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4 {{ $errors->has('last_name') ? ' has-error' : '' }} ">
                            <label for="last_name">Last Name</label>
                        <input type="text" class="form-control list-group-item" value="{{ old('last_name', $v_user->last_name) }}" name="last_name" id="last_name" disabled>
                                 @if ($errors->has('last_name'))
                                    <span class="help-block"><strong>{{ $errors->first('last_name') }}</strong></span>
                                 @endif
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4 {{ $errors->has('email') ? ' has-error' : '' }} ">
                            <label for="email">Email</label>
                        <input type="email" class="form-control list-group-item" value="{{ old('email', $v_user->email) }}" name="email" id="email" disabled>
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
                            <label for="pwd">Role</label>
                            <div class="form-group">
                              @empty($v_user->role_id)
                                <input type="text" class="form-control list-group-item"
                                    value="{{ "No role assigned yet!"}}"  disabled>
                              @endempty
                                @foreach ($roles as $key => $item)
                                    @if ( $item === $v_user->role_id)
                                    <input type="text" class="form-control list-group-item"
                                        value="{{ strtoupper($key) }}"  disabled>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                        </div>
                    </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                      @endforeach
                </form>
            </div>
        </div>
        <!-- End -->
        <div class="flex-grow-1"></div>
 @include('partials.footer')
</div>
