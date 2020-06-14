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
                <h3>Project Summary</h3>
                <div class="col-3"><span><i><b>Owner:</b> {{ ($r->full_name) ? $r->full_name : $r->cc_company_name }}</i></span></div>
            </div>
            <br><br>
            <div class="card-body">
                @foreach ($projectById as $project)
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_title">Project Title</label>
                            <input type="text" class="form-control list-group-item " placeholder="" id="title"
                                name="title" value="{{ old('title', $project->title) }}" disabled>
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                    <div class="form-group col-md-4">
                        <label for="validate_country">Region</label>
                        <div class="form-group">
                            @foreach ($regionId as $key => $value)
                                @if ( in_array($project->rid, [$key]) && $project->active === 'yes'  )
                                <div>
                                    <div class="form-group list-group-item col-12" >
                                        {{ ucwords($value) }}
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_country">Town</label>
                        @foreach ($townId as $key => $town)
                        @if ( in_array($project->rid, [$key]) && $project->active === 'yes'  )
                        <div>
                            <div class="form-group list-group-item col-12" >
                                {{ ucwords($town) }}
                            </div>
                        </div>
                        @endif
                    @endforeach

                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="other_landmark">Other Land Marks Close to Project</label>
                            <input type="text" class="form-control list-group-item" id="landmark"
                                name="landmark" value="{{ old('title', $project->landmark) }}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="project_state">Current State of Project</label>
                            <div class="form-group">
                                @foreach ($project_status as $key => $status)
                                @if ( in_array($project->statusid,[$key]) )
                                    <div>
                                        <div class="form-group list-group-item col-12" >
                                            {{ ucwords($status) }}
                                        </div>
                                    </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone_number">Total Cost of Project</label>
                            <input type="text" class="form-control list-group-item" id="totalcost"
                                name="totalcost" value="{{ old('totalcost', $project->totalcost) }}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-6"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_othername">Project Description</label>
                        <textarea class="list-group-item" name="description" id="description" cols="38" rows="5" disabled value="{{ old('description', $project->description) }}">
                            {{$project->description}}</textarea>
                        </div>
                    </div>
                      @endforeach
                </form>
            </div>
        </div>

        <!-- End -->
  <!-- Footer -->
  <div class="flex-grow-1"></div>
@include('partials.footer')
<!-- End Main Content Wrapper -->
