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
                <h3>Project Details</h3>

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
                @foreach ($projectId as $project)
                <form class="mt-5" action="{{route('projects.update', $project->pid) }}"  method="POST">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_title">Project Title</label>
                            <input type="text" class="form-control " placeholder="" id="title"
                                name="title" value="{{ old('title', $project->title) }}" required>
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                    <div class="form-group col-md-4">
                        <label for="validate_country">Region</label>
                        <select id="region" name="region" class="form-control custom-select" required>
                         @foreach ($countryId as $key => $country)
                        <option value="{{ $key }}" {{ old('region', in_array($country,[$country]) ? $project->region : 'null') == $key ? 'selected' : '' }}>
                            {{ ucwords($country) }}</option>
                        @endforeach
                        </select>
                    
                    </div>
                    </div>
               
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_country">Town</label>
                             <select id="town" name="town" class="form-control custom-select" required>
                            @foreach ($countryId as $key => $country)
                        <option value="{{ $key }}" {{ old('town', in_array($country,[$country]) ? $project->town : 'null') == $key ? 'selected' : '' }}>
                            {{ ucwords($country) }}</option>
                        @endforeach
                        </select>

                        </div>
                        <div class="form-group col-md-2">

                        </div>
                       
                        <div class="form-group col-md-4">
                            <label for="other_landmark">Other Land Marks Close to Project</label>
                            <input type="text" class="form-control" id="landmark"
                                name="landmark" value="{{ old('title', $project->landmark) }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="project_state">Current State of Project</label>
                            <select id="stage" name="stage" class="form-control custom-select" required>
                            @foreach ($project_status as $key => $status) 
                               <option value="{{ $key }}" {{ old('stage', in_array($status,[$status]) ? $project->town : 'null') == $key ? 'selected' : '' }}>
                            {{ ucwords($status) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                       
                        <div class="form-group col-md-4">
                            <label for="validate_phone_number">Total Cost of Project</label>
                            <input type="text" class="form-control" id="totalcost"
                                name="totalcost" value="{{ old('totalcost', $project->totalcost) }}" required>

                        </div> 
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="validate_othername">Project Description</label>
                        <textarea name="description" id="description" cols="100%" rows="10" value="{{ old('description', $project->description) }}"> 
                            {{$project->description}}</textarea>
                        </div>
                            {{-- <div class="form-group col-md-2"></div> --}}
                        
                    </div>
                     <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="col text-center">
                                  <button type="submit" class="btn btn-lg btn-primary"><i data-feather="database"></i>
                                    Update Project</button>
                                </div>
                                <div class="form-group col-md-2"></div>
                        </div>
                      </div>
                      @endforeach
                </form>
            </div>
        </div>

        <!-- End -->
  <!-- Footer -->
  <div class="flex-grow-1"></div>
</div>
<!-- End Main Content Wrapper -->

@include('partials.footer')
    

      