@include('partials.master_header')
    @include('partials.breadcrumb')
    <!-- End Breadcrumb Area -->
        <!-- Start -->
        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>New Role</h3>
            </div>

            <div class="card-body">
            <form class="mt-5" action="{{ route('role.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-3"> </div>
                        <div class="form-group col-md-4">
                            <label for="role">Role</label>
                        <input type="text" class="form-control" name="type" id="type" required>        
                        </div>
                        <div class="form-group col-md-5"> </div>
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
<!-- End Main Content Wrapper -->
@include('partials.footer')
    

      