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
                <h3>Create Country</h3>
            </div>

            <div class="card-body">
                <form class="mt-5" action="{{route('nationality.store') }}"  method="POST">
                    {{ csrf_field() }}
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_region">Country Name</label>
                            <input type="text" id="country_name" name="country_name" class="form-control">
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
                            <input type="text" id="country_code" name="country_code" class="form-control">
                        </div>
                    </div>
                    {{-- <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="other_landmark">Other Land Marks Close to Project</label>
                            <input type="text" class="form-control" id="landmark"
                                name="landmark" required>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="project_state">Current State of Project</label>
                            <select id="statusid" name="statusid" class="form-control custom-select" required>
                                <option>-- select --</option>
                                @foreach ($project_status as $key => $status) 
                                <option value="{{ $status }}" class="text-capitalize">{{ ucwords($key)  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div> --}}
                    {{-- <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_phone_number">Total Cost of Project</label>
                            <input type="number" step="0.1" class="form-control" id="totalcost"
                                name="totalcost" required>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_othername">Project Description</label>
                            <textarea name="description" id="description" cols="43" rows="6" required></textarea>
                        </div>
                    </div> --}}
                     <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                    Add Country</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
        

      