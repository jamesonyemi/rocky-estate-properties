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
                <h3>Title Summary</h3>
            </div>

            <div class="card-body">
                @foreach ($personal_title as $p_title)
                <form class="mt-5">
                    {{ csrf_field() }}
                    <div class="form-row">
                        {{-- <div class="form-group col-md-4">
                            <label for="validate_country">Region</label>
                            <input type="text" class="form-control" name="rid" id="rid" value="{{  }}" readonly disabled >
                            
                        </div> --}}
                        <div class="form-group col-md-3"> </div>
                        <div class="form-group col-md-4">
                            <label for="p_title">Personal Title</label>
                        <input type="text" class="form-control" name="salutation" id="salutation" 
                                value="{{ old('salutation', ucfirst($p_title->salutation) ) }}"  disabled>
                        </div>
                        <div class="form-group col-md-5"> </div>

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
    

      