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
                <h3>View Currency Type</h3>
            </div>

            <div class="card-body">
        @foreach ($currency as $curType)
                <form class="mt-5" >
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_region">Currency Name</label>
                            <input type="text" id="long_name" name="long_name" class="form-control" 
                                value="{{ old('long_name', $curType->long_name) }}" disabled>
                        </div>
                        <div class="form-group col-md-2"></div>
                
                        <div class="form-group col-md-4">
                            <label for="title">Currency Code (e.g GHC):</label>
                            <input type="text" id="short_name" name="short_name" class="form-control"
                                value="{{ old('short_name', $curType->short_name) }}" disabled>
                        </div>
                    </div>
                      @endforeach
                </form>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
        

      