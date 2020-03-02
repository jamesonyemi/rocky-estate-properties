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
                <form class="mt-5" action="{{route('towns.store') }}"  method="POST">
                    {{ csrf_field() }}
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
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="project_state">Active</label>
                            <select id="active" name="active" class="form-control custom-select" required>
                                <option value="yes">Yes</option>
                                <option value="no">No</option>
                            </select>
                        </div>
                        <div class="form-group col-md-8"></div>
                    </div>
                     <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                    Add Town</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                </form>
            </div>
        </div>

        <!-- End -->
 @include('partials.footer')
        

      