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
                            <input type="text" class="form-control " placeholder="" id="title"
                                name="title" value="{{ old('title', $project->title) }}" disabled>
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                    <div class="form-group col-md-4">
                        <label for="validate_country">Region</label>
                        <select  id="region" name="region" class="form-control custom-select" disabled>
                            @foreach ($regionId as $key => $value)
                        <option value="{{ $key }}" {{ old('region', in_array($value,[$value]) ? $project->rid : 'null') === $key ? 'selected' : '' }}>
                            {{ ucwords($value) }}</option>
                        @endforeach
                        </select>

                    </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_country">Town</label>
                             <select id="town" name="town" class="form-control custom-select" disabled>
                            @foreach ($townId as $key => $town)
                        <option value="{{ $key }}" {{ old('town', in_array($town,[$town]) ? $project->tid : 'null') == $key ? 'selected' : '' }}>
                            {{ ucwords($town) }}</option>
                        @endforeach
                        </select>

                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="other_landmark">Other Land Marks Close to Project</label>
                            <input type="text" class="form-control" id="landmark"
                                name="landmark" value="{{ old('title', $project->landmark) }}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="project_state">Current State of Project</label>
                            <select id="statusid" name="statusid" class="form-control custom-select" disabled>
                            @foreach ($project_status as $key => $status)
                               <option value="{{ $key }}" {{ old('statusid', in_array($status,[$status]) ? $project->tid : 'null') == $key ? 'selected' : '' }}>
                            {{ ucwords($status) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"> </div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone_number">Total Cost of Project</label>
                            <input type="text" class="form-control" id="totalcost"
                                name="totalcost" value="{{ old('totalcost', $project->totalcost) }}" disabled>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-6"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_othername">Project Description</label>
                        <textarea name="description" id="description" cols="38" rows="5" disabled value="{{ old('description', $project->description) }}">
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
