@include('partials.header')
@include('partials.side_menu')

<!-- End Sidemenu Area -->

<!-- Main Content Wrapper -->
<div class="main-content d-flex flex-column">
    <!-- Top Navbar -->
    <!-- Top Navbar Area -->
    @include('partials.topnav')
    <!-- End Top Navbar Area -->

    <!-- Main Content Layout -->
    <!-- Breadcrumb Area -->
    @include('partials.breadcrumb')
    <!-- End Breadcrumb Area -->


        <!-- Start -->

        <div class="card mb-30">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Title Details</h3>
            </div>

            <div class="card-body">
            <form class="mt-5" action="{{ route('title.store') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        {{-- <div class="form-group col-md-4">
                            <label for="validate_country">Region</label>
                            <input type="text" class="form-control" name="rid" id="rid" value="{{  }}" readonly disabled >
                            
                        </div> --}}
                        <div class="form-group col-md-3"> </div>
                        <div class="form-group col-md-4">
                            <label for="p_title">Personal Title</label>
                        <input type="text" class="form-control" name="salutation" id="salutation" required>        
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
    

      