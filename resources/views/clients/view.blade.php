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
                <h3>View Client Details</h3>
            </div>
            <div class="card-body">
                <hr style="background-color:fuchsia; opacity:0.1">
                @foreach ($clientId as $client)
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_title">Title</label>
                            <div class="list-group-item">{{ $client->title }}</div>
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="validate_firstname">First Name</label>
                            <div class="list-group-item">{{ $client->fname }}</div>
                        </div>
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_othername">Middle Name</label>
                            <div class="list-group-item">{{ $client->oname }} </div>
                            </div>
                                <div class="form-group col-md-2">

                                </div>
                        <div class="form-group col-md-4">
                            <label for="validate_lastname">Last Name</label>
                            <div class="list-group-item">{{ $client->lname }}</div>
                        </div>
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_birthday">Date of Birth</label>
                            <div class="list-group-item">{{ date("l, jS F, Y", strtotime($client->dob)) }}</div>
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                        <div class="form-group col-md-4">
                            <label for="validate_email">Email</label>
                            <div class="list-group-item">{{ $client->email }}</div>
                        </div>

                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">

                            <label for="validate_phone1">Phone1</label>
                            <div class="list-group-item">{{ $client->phone1 }}</div>

                        </div>
                            <div class="form-group col-md-2">

                            </div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone2">Phone2</label>
                            <div class="list-group-item">{{ $client->phone2 }}</div>
                        </div>

                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-1"></div>
                    <div class="form-group col-md-4">
                    <label for="validate_country">Nationality</label>
                        @foreach ($countryId as $key => $country)
                            @if ( $client->nationality === $key )
                            <div class="list-group-item">{{ ucwords($country) }}</div>
                            @endif
                        @endforeach
                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="validate_gender">Gender</label>
                            @foreach ($genId as $key => $gender)
                                @if ( $client->gender === $key )
                                <div class="list-group-item">{{ ucwords($gender) }}</div>
                                @endif
                            @endforeach
                        </div>
                    </div>

                    <div class="form-row">
                       <div class="form-group col-md-1"></div>
                      <div class="form-group col-md-4">
                            <label for="validate_nok">Next of Kin</label>
                                <div class="list-group-item">{{ $client->nok }}</div>


                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone_number">Next of Kin Phone Number</label>
                                <div class="list-group-item">{{ $client->nokphone }}</div>

                        </div>
                    </div>
                    <div class="form-row">
                       <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                              <label for="validate_nok">Relationship to Next of Kin</label>
                              <div class="list-group-item">{{ $client->relationship }}</div>
                          </div>
                          <div class="form-group col-md-2"></div>
                      </div>
                      @endforeach
            </div>
        </div>
        @include('partials.footer')
    </div>
        <!-- End -->
  <div class="flex-grow-1"></div>
</div>
<!-- End Main Content Wrapper -->

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