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
                <h3>Client Details</h3>

    
            </div>

            <div class="card-body">
                <form class="mt-5" action="{{route('clients.store') }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_title">Title</label>
                            <input type="text" class="form-control " placeholder="" id="client_title"
                                name="client_title">
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="validate_firstname">First Name</label>
                            <input type="text" class="form-control " name="last_name" id="client_first_name"
                                name="client_first_name" placeholder="">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_othername">Middle Name</label>
                            <input type="text" class="form-control" name="client_middle_name" id="client_middle_name"
                                placeholder="">
                            </div>
                                <div class="form-group col-md-2">
    
                                </div>
                        <div class="form-group col-md-4">
                            <label for="validate_lastname">Last Name</label>
                            <input type="text" class="form-control" placeholder="" id="client_last_name"
                                name="client_last_name">

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_birthday">Date of Birth</label>
                            <input type="date" class="form-control" id="client_dob" name="client_dob" required>
                        
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="validate_email">Email</label>
                            <input type="email" name="client_email" class="form-control" id="client_email" required>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">

                            <label for="validate_fphone">Phone1</label>
                            <input type="text" class="form-control" id="primary_phone_number" name="primary_phone_number" required>
                        </div>
                            <div class="form-group col-md-2">
    
                            </div>
                        <div class="form-group col-md-4">
                            <label for="validate_sphone">Phone2</label>
                            <input type="text" class="form-control" id="second_phone_number" name="second_phone_number"
                                required>
                        </div>
                        
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                                                    <label for="validate_country">Nationality</label>
                                                    <select id="client_nationality" name="client_nationality" class="form-control custom-select"
                                                        required>
                                                        <option value="">Open this select menu</option>
                                                        <option>Ghana</option>
                                                        <option>USA</option>
                                                        <option>Canada</option>
                                                        <option>Togo</option>
                                                        <option>Mali</option>
                                                        <option>Senegal</option>
                                                        <option>Portugal</option>
                                                        <option>Argentina</option>
                                                        <option>Spain</option>
                                                        <option>Holland</option>
                                                        <option>Iceland</option>    
                                                        <option>Russia</option>
                                                    </select>
                        
                                                </div>
                        <div class="form-group col-md-2">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="validate_nok">Next of Kin</label>
                            <input type="text" class="form-control" id="client_nok" name="client_nok">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone_number">Phone Number of Next of Kin</label>
                            <input type="text" class="form-control" id="client_nok_phone_number"
                                name="client_nok_phone_number">

                        </div>
                    </div>

                    <div class="form-row">
                      

                        <div class="form-group col-md-2">

                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary bx-pull-center">Save</button>
                </form>
            </div>
            </div>
        </div>

        <!-- End -->
 