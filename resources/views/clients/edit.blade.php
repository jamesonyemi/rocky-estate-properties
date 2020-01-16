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
                @foreach ($clients as $client)
                <form class="mt-5" action="{{ route('clients.update', $client->clientid) }}"  method="POST">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_title">Title</label>
                            <input type="text" class="form-control " placeholder="" id="title"
                        name="title" value="{{ $client->title }}">
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="validate_firstname">First Name</label>
                            <input type="text" class="form-control " id="fname"
                                name="fname" placeholder="" value="{{ $client->fname }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_othername">Middle Name</label>
                            <input type="text" class="form-control" name="oname" id="oname"
                                placeholder="" value="{{ $client->oname }}">
                            </div>
                                <div class="form-group col-md-2">
    
                                </div>
                        <div class="form-group col-md-4">
                            <label for="validate_lastname">Last Name</label>
                            <input type="text" class="form-control" placeholder="" id="lname"
                                name="lname" value="{{ $client->lname }}">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_birthday">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" required value="{{ $client->dob }}">
                        
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="validate_email">Email</label>
                            <input type="email" name="email" class="form-control" id="email" required value="{{ $client->email }}">
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">

                            <label for="validate_phone1">Phone1</label>
                            <input type="text" class="form-control" id="phone1" name="phone1" required value="{{ $client->phone1 }}">
                        </div>
                            <div class="form-group col-md-2">
    
                            </div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone2">Phone2</label>
                            <input type="text" class="form-control" id="phone2" name="phone2" value="{{ $client->phone2 }}"
                                required>
                        </div>
                        
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="validate_country">Nationality</label>
                    <select id="nationality" name="nationality" class="form-control custom-select" required>
                        @if ( empty($client->nationality) )
                        <option value="">Select Nationality</option>
                        <option value="1">Ghana</option>
                        <option value="2">USA</option>
                        <option value="3">Canada</option>
                        <option value="4">Togo</option>
                        <option value="5">Mali</option>
                        <option value="6">Senegal</option>
                        <option value="7">Portugal</option>
                        <option value="8">Argentina</option>
                        <option value="9">Spain</option>
                        <option value="10">Holland</option>
                        <option value="11">Iceland</option>
                        <option value="12">Russia</option>
                        @else
                            <option value="{{$client->nationality}}">{{ $client->nationality }}</option>
                        @endif
                        </select>
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="validate_gender">Gender</label>
                            <select id="gender" name="gender" class="form-control custom-select"
                                required>
                                @foreach ($genders as $key => $value)                    
                                {{ $value->genderId }}
                                <option value="{{ $value->genderId }}" class="text-capitalize">{{ ($value->genderType)  }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="disabledSelect">Gender</label>
                            <select id="disabledSelect" name="gender" class="form-control custom-select">
                                <option value="{{ $value->genderId }}" class="text-capitalize">{{ ($value1->genderType)  }}</option>
                            </select>
                          </div>
                        
                    </div>

                    <div class="form-row">
                      <div class="form-group col-md-4">
                            <label for="validate_nok">Next of Kin</label>
                            <input type="text" class="form-control" id="nok"
                                name="nok" value="{{ $client->nok }}">

                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone_number">Next of Kin Phone Number</label>
                            <input type="text" class="form-control" id="nokphone"
                                name="nokphone" value="{{ $client->nokphone }}">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                              <label for="validate_nok">Relationship to Next of Kin</label>
                              <input type="text" class="form-control" id="relationship"name="relationship" value="{{ $client->relationship }}">
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
                                    Update Client Info</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                          
                      @endforeach
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
    