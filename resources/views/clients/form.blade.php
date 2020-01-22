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
        <div class="card mb-30" style="margin-top:-0.2%; padding-bottom:5%">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3>Client Details</h3>
            </div>
            <div class="card-body">
                <hr style="background-color:fuchsia; opacity:0.1">
                <form class="mt-5" action="{{route('clients.store') }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_title">Title</label>
                            <select id="title" name="title" class="form-control custom-select" required>
                                <option>-- select --</option>
                              @foreach ($titleId as $id => $title)
                                    <option value="{{ $title }}" class="text-capitalize">{{ ucwords($id)  }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="validate_firstname">First Name</label>
                            <input type="text" class="form-control " id="fname"
                                name="fname" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_othername">Middle Name</label>
                            <input type="text" class="form-control" name="oname" id="oname"
                                placeholder="">
                            </div>
                                <div class="form-group col-md-2">
    
                                </div>
                        <div class="form-group col-md-4">
                            <label for="validate_lastname">Last Name</label>
                            <input type="text" class="form-control" placeholder="" id="lname"
                                name="lname">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_birthday">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" required>
                        
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="validate_email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">

                            <label for="validate_phone1">Phone1</label>
                            <input type="text" class="form-control" id="phone1" name="phone1" required>
                        </div>
                            <div class="form-group col-md-2">
    
                            </div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone2">Phone2</label>
                            <input type="text" class="form-control" id="phone2" name="phone2"
                                required>
                        </div>
                        
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="validate_country">Nationality</label>
                    <select id="gender" name="gender" class="form-control custom-select"  required>
                                <option>-- select --</option>
                                @foreach ($countryId as $key => $country)
                                <option value="{{ $country }}" class="text-capitalize">{{ ucwords($key)  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="validate_gender">Gender</label>
                            <select id="gender" name="gender" class="form-control custom-select"  required>
                            <option>-- select --</option>
                                @foreach ($genders as $id => $gender_type)
                                <option value="{{ $gender_type }}" class="text-capitalize">{{ ucwords($id)  }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                            <label for="validate_nok">Next of Kin</label>
                            <input type="text" class="form-control" id="nok"
                                name="nok">

                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone_number">Next of Kin Phone Number</label>
                            <input type="text" class="form-control" id="nokphone"
                                name="nokphone">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                              <label for="validate_nok">Relationship to Next of Kin</label>
                              <input type="text" class="form-control" id="relationship"name="relationship">
                          </div>
                          <div class="form-group col-md-2">
  
                          </div>
                          {{-- <div class="form-group col-md-4">
                              <label for="validate_phone_number">Next of Kin Phone Number</label>
                              <input type="text" class="form-control" id="nokphone"
                                  name="nokphone">
  
                          </div> --}}
                      </div>
                      <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                    Add New Client</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>
        <!-- End -->
  <!-- Footer -->
  <div class="flex-grow-1"></div>
</div>
<!-- End Main Content Wrapper -->
    
@include('partials.footer_script')
    