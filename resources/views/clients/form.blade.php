<!-- Start -->
        <div class="card mb-30">
            <h3>Individual Client</h3>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            <hr style="background-color:fuchsia; opacity:0.1">
            <div class="card-body">
                <form class="mt-5" action="{{route('clients.store') }}"  method="POST">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_title">Title</label>
                            <select id="title" name="title" class="form-control custom-select" required>
                                <option value="">--select--</option>
                              @foreach ($titleId as $value => $title_id)
                                    <option value="{{ $value }}" class="text-capitalize">{{ ucwords($value)  }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="validate_firstname">First Name</label>
                            <input type="text" class="form-control " id="fname"
                                name="fname" placeholder="" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_othername">Middle Name</label>
                            <input type="text" class="form-control" name="oname" id="oname"
                                placeholder="" >
                            </div>
                                <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="validate_lastname">Last Name</label>
                            <input type="text" class="form-control" placeholder="" id="lname" name="lname" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_birthday">Date of Birth</label>
                            <input type="date" class="form-control" id="dob" name="dob" max="<?= date('Y-m-d') ?>" required>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_email">Email</label>
                            <input type="email" id="email" name="email" class="form-control"  required>
                            <span id="signal-message"></span>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_phone1">Phone1</label>
                            <input type="tel" class="form-control" id="phone1" name="phone1" required>
                        </div>
                            <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone2">Phone2</label>
                            <input type="tel" class="form-control" id="phone2" name="phone2">
                        </div>
                    </div>
                    <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="validate_country">Nationality</label>
                    <select id="nationality" name="nationality" class="form-control custom-select"  required>
                                <option value="">--select--</option>
                                @foreach ($countryId as $key => $country)
                                <option value="{{ $country }}" class="text-capitalize">{{ ucwords($key)  }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_gender">Gender</label>
                            <select id="gender" name="gender" class="form-control custom-select"  required>
                            <option value="">--select--</option>
                                @foreach ($genders as $id => $gender_type)
                                <option value="{{ $gender_type }}" class="text-capitalize">{{ ucwords($id)  }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                            <label for="validate_nok">Next of Kin</label>
                            <input type="text" class="form-control" id="nok" name="nok" required>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone_number">Next of Kin Phone Number</label>
                            <input type="tel" class="form-control" id="nokphone" name="nokphone" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                              <label for="validate_nok">Relationship to Next of Kin</label>
                              <input type="text" class="form-control" id="relationship"name="relationship" required>
                          </div>
                          <div class="form-group col-md-2"> </div>
                      </div>
                      <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col text-center">
                                  <button type="submit" id="btn-save" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                    Save</button>
                                </div>
                            <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>
            </div>
        </div>
    </div>
        <!-- End -->