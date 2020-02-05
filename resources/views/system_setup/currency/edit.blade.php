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
                <h3>Edit Currency Type</h3>
            </div>

            <div class="card-body">
        @foreach ($currency as $curType)
                <form class="mt-5" action="{{ route('currency.update', $curType->id) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" id="" value="PUT">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_region">Currency Name</label>
                            <input type="text" id="long_name" name="long_name" class="form-control" 
                                value="{{ old('long_name', $curType->long_name) }}">
                        </div>
                        <div class="form-group col-md-2"></div>
                
                        <div class="form-group col-md-4">
                            <label for="title">Currency Code (e.g GHC):</label>
                            <input type="text" id="short_name" name="short_name" class="form-control"
                                value="{{ old('short_name', $curType->short_name) }}">
                        </div>
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
 @include('partials.footer')
        

      