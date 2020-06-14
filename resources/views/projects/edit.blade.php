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
                <div class="col-3"><span><i><b>Owner:</b> {{ ($r->full_name) ? $r->full_name : $r->cc_company_name }}</i></span></div>
            </div>
            <div class="card-body">
                @foreach ($projectById as $project)
                <?php $encryptId = Crypt::encrypt($project->pid); ?>
                <form class="mt-5" action="{{route('projects.update', $encryptId) }}"  method="POST">
                    {{ csrf_field() }}
                    <input name="_method" type="hidden" value="PUT">
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_title">Project Title</label>
                            <input type="text" class="form-control " placeholder="" id="title"
                                name="title" value="{{ old('title', $project->title) }}" required>
                        </div>
                        <div class="form-group col-md-2">

                        </div>
                    <div class="form-group col-md-4">
                        <label for="validate_country">Region</label>
                        <select id="rid" name="rid" class="form-control custom-select" required>
                            @foreach ($regionId as $key => $value)
                        <option value="{{ $key }}" {{ old('rid', in_array($value,[$value]) ? $project->rid : 'null') === $key ? 'selected' : '' }}>
                            {{ ucwords($value) }}</option>
                        @endforeach
                        </select>

                    </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_country">Town</label>
                             <select id="tid" name="tid" class="form-control custom-select" required>
                            @foreach ($townId as $key => $town)
                            @if ( in_array($project->tid, [$key]) && $project->active === 'yes'  )
                            <option value="{{ $key }}" {{ old('tid', in_array($town,[$town]) ? $project->tid : 'null') == $key ? 'selected' : '' }}>
                                {{ ucwords($town) }}</option>
                                @endif
                        @endforeach
                        </select>

                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="other_landmark">Other Land Marks Close to Project</label>
                            <input type="text" class="form-control" id="landmark"
                                name="landmark" value="{{ old('title', $project->landmark) }}" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-4">
                            <label for="project_state">Current State of Project</label>
                            <select id="statusid" name="statusid" class="form-control custom-select" required>
                            @foreach ($project_status as $key => $status)
                               <option value="{{ $key }}" {{ old('statusid', in_array($status,[$status]) ? $project->tid : 'null') == $key ? 'selected' : '' }}>
                            {{ ucwords($status) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-2"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_phone_number">Total Cost of Project</label>
                            <input type="text" class="form-control" id="totalcost"
                                name="totalcost" value="{{ old('totalcost', $project->totalcost) }}" required>

                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-1"></div>
                        <div class="form-group col-md-6"></div>
                        <div class="form-group col-md-4">
                            <label for="validate_othername">Project Description</label>
                        <textarea name="description" id="description" cols="38" rows="5" required value="{{ old('description', $project->description) }}">
                            {{$project->description}}</textarea>
                        </div>
                            {{-- <div class="form-group col-md-2"></div> --}}

                    </div>
                     <hr style="background-color:fuchsia; opacity:0.1">
                      <div class="container">
                          <div class="row">
                              <div class="form-group col-md-2"></div>
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
<!-- End Main Content Wrapper -->

@include('partials.footer')
