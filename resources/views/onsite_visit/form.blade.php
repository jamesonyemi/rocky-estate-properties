@include('partials.header')

    <!-- Side Menu -->
    <!-- Start Sidemenu Area -->
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
                <h3>On Site Visits  </h3>

                <!-- <div class="dropdown">
                    <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true"
                        aria-expanded="false">
                        <i class='bx bx-dots-horizontal-rounded'></i>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class='bx bx-show'></i> View
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class='bx bx-edit-alt'></i> Edit
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class='bx bx-trash'></i> Delete
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class='bx bx-printer'></i> Print
                        </a>
                        <a class="dropdown-item d-flex align-items-center" href="#">
                            <i class='bx bx-download'></i> Download
                        </a>
                    </div>
                </div> -->
            </div>

            <div class="card-body">
                <!-- <form>
                    <div class="row">
                        <div class="col">
                            <input type="text" class="form-control" placeholder="First name">
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" placeholder="Last name">
                        </div>
                    </div>
                </form> -->

            <form method="POST" action="{{ route('onsite-visit.store')}}" enctype="multipart/form-data" class="mt-5">
                {{ csrf_field() }}
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="client">Client</label>
                        <select id="clientid" name="clientid" class="form-control custom-select" required>
                            <option>-- select --</option>
                            @foreach ($clients as $client_id => $client)
                            
                                @if ($client->clientid )
                                <option value="{{ $client->clientid }}" class="text-capitalize">
                                    {{ ucwords( $client->title . " " .$client->fname . " " . $client->lname)  }}
                                </option>
                                @endif
                                
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-2"></div>
            
                    <div class="form-group col-md-4">
                        <label for="pid">Project:</label>
                        <select id="pid" name="pid" class="form-control"></select>
                    </div>
                </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="date_of_visit">Date of Visit</label>
                            <input type="date" class="form-control" id="vdate" name="vdate">

                        </div>
                        <div class="form-group col-md-2">  </div>
                        <div class="form-group col-md-4">
                            <label for="status">Status of Project on Visit</label>
                            <select id="status" name="status" class="form-control custom-select" required>
                                <option>-- select --</option>
                                @foreach ($project_status as $key => $status) 
                                    <option value="{{ $status }}" class="text-capitalize">{{ ucwords($key)  }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div>
                    {{-- <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="owner">Owner of Project</label>
                            <select id="clientid" name="clientid" class="form-control custom-select" required>
                                <option>-- select --</option>
                                @foreach ($project_status as $key => $status) 
                                    <option value="{{ $status }}" class="text-capitalize">{{ ucwords($key)  }}</option>
                                    @endforeach
                                </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="visit_id">Project Visited</label>
                            <select id="project" name="vid" class="form-control custom-select" required>
                                <option>-- select --</option>
                                @foreach ($project_visited as $key => $status) 
                                    <option value="{{ $status }}" class="text-capitalize">{{ ucwords($key)  }}</option>
                                    @endforeach
                                </select>
                        </div>
                    </div> --}}
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="img_url">Photos of Project on Visit</label>
                            <input type="file" class="form-control" id="img_name" name="img_name[]" multiple required>
                        
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                       <div class="form-group col-md-4">
                            <label for="visit_comment">Brief Comment</label>
                            <textarea name="comments" id="comments" cols="44" rows="6" required></textarea>
                        </div>

                        <!-- <div class="form-group col-md-4">
                            <label for="validate_phone_number">Other Project</label>
                            <input type="text" class="form-control" id="land_mark"
                                name="land_mark">

                        </div> -->
                    </div>
                    {{-- <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="visit_comment">Brief Comment</label>
                            <textarea name="comment" id="comment" cols="100%" rows="10" required></textarea>
                        </div>
                            <div class="form-group col-md-2"></div>
                        
                    </div> --}}
                    
                    <hr style="background-color:fuchsia; opacity:0.1">
                    <div class="container">
                        <div class="row">
                            <div class="col text-center">
                                <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                  Save</button>
                              </div>
                              <div class="form-group col-md-2"></div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
     <!-- End -->
 
<!-- End Main Content Wrapper -->

@include('partials.footer')
