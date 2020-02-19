@include('partials.master_header')
    @include('partials.breadcrumb')
    <!-- End Breadcrumb Area -->
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Edit Role</h3>
            </div>

            <div class="card-body">
            @foreach ($roles as $role)
            <form class="mt-5" action="{{ route('role.update', $role->id) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="form-row">
                        <div class="form-group col-md-3"> </div>
                        <div class="form-group col-md-4">
                            <label for="role">Role</label>
                        <input type="text" class="form-control" name="type" id="type" 
                                value="{{ old('type', ucfirst($role->type) ) }}"  required>
                        </div>
                        <div class="form-group col-md-5"> </div>

                    </div>
                    <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                   Update</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                      @endforeach
                </form>
            </div>
        </div>
        <!-- End -->
  <!-- Footer -->
  <div class="flex-grow-1"></div>
</div>
<!-- End Main Content Wrapper -->
@include('partials.footer')
    

      