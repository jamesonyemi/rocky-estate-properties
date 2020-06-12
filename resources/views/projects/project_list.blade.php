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

   @include('partials.success_alert')

    <!-- Begin page -->
    <div id="layout-wrapper">


        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div >

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18 text-uppercase">All Projects</h4>
                                <div class="page-title-right">
                                    <a href="{{ url()->previous() }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >
                                        <i class="bx bx-arrow-back"></i>
                                        Back</a>
                                        <span class="col-sm-2"></span>
                                    <a href="{{ route('projects.create') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >
                                        Add New Project</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <!-- FILTERING BY PROJECT STATUS  -->
                                    <div><span id="filter_status"></span></div>
                                    <!-- END OF FILTERING BY PROJECT STATUS-->
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc">  </div>
                                    <table id="" class="table table-bordered dt-responsive nowrap project" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>PID</th>
                                                <th>Owner</th>
                                                <th>Project Title</th>
                                                <th>Region</th>
                                                <th>Town</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $project)
                                            @if ( $project->flag_as_deleted === 0)
                                            <?php $encryptId = Crypt::encrypt($project->pid) ?>
                                            <tr>
                                                <td id="project_id"></td>
                                                <td >
                                                    <a href="{{ route('projects.show',  $encryptId) }}" class="nav-link">
                                                    {{ !empty($project->cc_company_name) ? $project->cc_company_name :$project->full_name }}</span></a></td>
                                                <td > {{ $project->project_title}} </td>
                                                <td>{{ $project->region }}</span></td>
                                                <td>{{ $project->location }}</td>
                                                    @switch($project->client_project_status)
                                                        @case('ongoing')
                                                        <td id="status" class="text-primary">{{ ucfirst($project->client_project_status) }}</td>
                                                            @break
                                                        @case('completed')
                                                        <td id="status" class="text-success"  >{{ ucfirst($project->client_project_status) }}</td>
                                                            @break
                                                        @case('stalled')
                                                        <td id="status" class="text-warning">{{ ucfirst($project->client_project_status) }}</td>
                                                            @break
                                                        @case('cancelled')
                                                        <td id="status" class="text-danger" >{{ ucfirst($project->client_project_status) }}</td>
                                                            @break
                                                        @default
                                                    @endswitch
                                                <td>
                                                    <a href=" {{ route('projects.show',  $encryptId)}}" class="d-inline-block text-success mr-2">
                                                        <i class="bx bxs-analyse"></i>
                                                    </a>
                                                    <a href="{{ route('projects.edit',  $encryptId) }}" class="d-inline-block text-success mr-2">
                                                            <i class="bx bx-edit"></i>
                                                        </a>
                                                    <a  href="#" class="d-inline-block text-success"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('delete_project').submit();">

                                                    <form id="delete_project" action="{{ route('projects.destroy',  $encryptId) }}" method="post" >
                                                        {{ csrf_field() }}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <input type="hidden" name="is_deleted" id="is_deleted">
                                                        <i class="bx bx-trash"></i>
                                                    </form>
                                                </a>
                                                </td>
                                            </tr>
                                            @endif
                                            @endforeach
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                        <!-- end col -->
                    </div>
                    <!-- end row -->

                </div>
                <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
@include('partials.footer')