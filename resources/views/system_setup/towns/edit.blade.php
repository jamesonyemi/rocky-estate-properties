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
                <h3>Create Town</h3>
            </div>

            <div class="card-body">
                <form class="mt-5" action="{{route('towns.update') }}"  method="POST">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    {{-- <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_region">Client</label>
                                <select id="clientid" name="clientid" class="form-control custom-select" required>
                                    <option>-- select --</option>
                            @foreach ($all_clients as $key => $client)
                                <option value="{{ $client->clientid }}" class="text-capitalize">
                                    {{ ucwords( ($client->title)."\n".($client->fname)."\n".($client->lname))  }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="validate_title">Project Title</label>
                            <input type="text" class="form-control" id="title"
                            name="title" required>
                                
                        </div>
                    </div> --}}
                    
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_region">Region</label>
                            <select id="rid" name="rid" class="form-control custom-select" required>
                                <option>-- select --</option>
                            @foreach ($regions as $id => $region)
                                    <option value="{{ $id }}" class="text-capitalize">{{ ucwords($region)  }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                
                        <div class="form-group col-md-4">
                            <label for="title">Towns:</label>
                            <input type="text" id="town" name="town" class="form-control">
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
                                    Update</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
        

      