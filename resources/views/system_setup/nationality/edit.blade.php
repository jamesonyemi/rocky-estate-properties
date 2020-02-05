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
                <h3>Edit Country</h3>
            </div>

            <div class="card-body">
        @foreach ($nationality as $nation)
                <form class="mt-5" action="{{ route('nationality.update', $nation->id) }}" method="POST">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" id="" value="PUT">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_region">Country Name</label>
                            <input type="text" id="country_name" name="country_name" class="form-control" 
                                value="{{ old('country_name', $nation->country_name) }}">
                            {{-- <select id="rid" name="rid" class="form-control custom-select" required>
                                <option>-- select --</option>
                            @foreach ($nationality as $id => $nation)
                                    <option value="{{ $id }}" class="text-capitalize">{{ ucwords($nation->country_name)  }}</option>
                                    @endforeach
                            </select> --}}
                        </div>
                        <div class="form-group col-md-2"></div>
                
                        <div class="form-group col-md-4">
                            <label for="title">Country Code (e.g GH):</label>
                            <input type="text" id="country_code" name="country_code" class="form-control"
                                value="{{ old('country_code', $nation->country_code) }}">
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
        

      