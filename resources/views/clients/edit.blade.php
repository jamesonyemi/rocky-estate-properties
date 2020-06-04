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
                @foreach ($clientId as $client)
                <form class="mt-5" action="{{ route('clients.update', $client->clientid) }}"  method="POST">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_title">Title</label>
                            <input type="text" class="form-control " placeholder="" id="title"
                        name="title" value="{{ $client->title }}" required>
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
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_othername">Middle Name</label>
                            <input type="text" class="form-control" name="oname" id="oname"
                                placeholder="" value="{{ $client->oname }}" required>
                            </div>
                                <div class="form-group col-md-2">

                                </div>
                        <div class="form-group col-md-4">
                            <label for="validate_lastname">Last Name</label>
                            <input type="text" class="form-control" placeholder="" id="lname"
                                name="lname" value="{{ $client->lname }}" required>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
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
                        <div class="form-group col-md-1"></div>
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
                      <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-4">
                    <label for="validate_country">Nationality</label>
                    <select id="nationality" name="nationality" class="form-control custom-select" required>
                        @foreach ($countryId as $key => $country)
                        <option value="{{ $key }}" {{ old('nationality', in_array($country,[$country]) ? $client->nationality : 'null') == $key ? 'selected' : '' }}>
                            {{ ucwords($country) }}</option>
                        @endforeach
                        </select>
                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="validate_gender">Gender</label>
                            <select id="gender" name="gender" class="form-control custom-select" required>
                                @foreach ($genId as $key => $gender)
                                <option value="{{ $key }}" {{ old('gender', in_array($gender,[$gender]) ? $client->gender : 'null') == $key ? 'selected' : '' }}>
                                       {{ ucwords($gender) }}
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                      <div class="form-group col-md-4">
                            <label for="validate_nok">Next of Kin</label>
                            <input type="text" class="form-control" id="nok"
                                name="nok" value="{{ $client->nok }}" required>

                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone_number">Next of Kin Phone Number</label>
                            <input type="text" class="form-control" id="nokphone"
                                name="nokphone" value="{{ $client->nokphone }}" required>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                              <label for="validate_nok">Relationship to Next of Kin</label>
                              <input type="text" class="form-control" id="relationship"name="relationship"
                               value="{{ $client->relationship }}" required>
                          </div>
                          <div class="form-group col-md-2">
                          </div>
                      </div>
                      <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                            <div class="form-group col-md-2"></div>
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary text-center"><i data-feather="database"></i> Save Changes</button>
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

<script type="text/javascript">
'use strict';
let genderStatus = ( () => {
     $('#genderStatus').click( (e) => { $('#exampleModal').modal('show'); e.preventDefault(); })
})();

</script>

<script>
    $(function (){
        $.ajaxSetup({
          headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#change-gender').on('click', function (event) {
            // let gender = '';
          $.post("{{ route('gender_update', $client->clientid) }}", {
            // {{ route('clients.update', $client->clientid) }}
            gender: $(this).data("gender"),
            // name: $(this).data("name"),
            // state: $(this).is(":checked") ? 0 : 1 // toggles
          }).done(function(data) {
            console.log(gender);
              console.log(data)
          });
        });
    });
</script>