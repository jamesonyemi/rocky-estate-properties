@include('partials.master_header')
    @include('partials.breadcrumb')
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Assign Role To User</h3>
            </div>
            <div class="card-body">
            <form class="mt-5" action="{{ route('assign-role-to-user') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-1"> </div>
                        <div class="form-group col-md-4">
                            <label for="role">Role</label>
                            <select name="role_id" id="role_id" class="form-control custom-select" required >
                                <option value="">--select--</option>
                                @foreach ($roles as $role)
                                <option class="text-capitalize" value="{!! $role->id !!}">{!! $role->type !!}</option>
                                @endforeach
                            </select>    
                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4"> 
                            <label for="role">Users</label>
                                @foreach ($users as $user)
                                    @if ( empty($user->role_id) )
                                    <br>
                                    <input type="checkbox" name="user_id[]" id="user_id" value="{!! $user->id !!}" class="" >
                                        {!! ucfirst($user->first_name . ' ' . $user->last_name) !!}
                                    @endif
                                @endforeach
                        </div>
                    </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                   Save</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>
            </div>
        </div>
        <!-- End -->
  <!-- Footer -->
  <div class="flex-grow-1"></div>
</div>
@include('partials.footer')
    

      