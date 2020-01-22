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
   
      <!-- Start -->
      <div class="row">
        <div class="col col-md-12">
            <div class="card recent-orders-box mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Projects</h3>
                    <div>
                        <a href="{{ route('projects.create') }}"> <button type="button" class="btn btn-success btn-sm rounded-pill">New project</button></a>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="dtable" >
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
                                @foreach ($all_projects as $project)
                                    {{-- @if ( $project->isdeleted === "no" ) --}}
                                <tr>
                                    <td>{{ $project->pid }}</td>
                                    <td >
                                        {{-- <img src="assets/img/user1.jpg" alt="image"> --}}
                                       
                                        {{ $project->title}}  {{-- TODO -- OwnerName of Project --}}
                                    </td>
                                    <td>{{ $project->title }}</span></td>
                                    <td>{{ $project->region }}</span></td>
                                    <td>{{ $project->town }}</td>
                                    <td>{{ $project->statusid }}</td>
                                    {{-- <td><span class="badge badge-primary">Received</span></td> --}}
                                    <td>
                                        {{-- <a href=" {{ route('projects.show', $project->pid)}}" class="d-inline-block text-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                                            <i class="bx bx-envelope"></i>
                                        </a> --}}
                                        <a href="{{ route('projects.edit', $project->pid) }}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        <a  href="#" class="d-inline-block text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                            onclick="event.preventDefault();
                                                     document.getElementById('delete_project').submit();">
                                       
                                        <form id="delete_project" action="{{ route('projects.destroy', $project->pid) }}" method="post" >
                                            {{ csrf_field() }}
                                            <input name="_method" type="hidden" value="DELETE">
                                            <i class="bx bx-trash"></i>
                                        </form> 
                                    </a>
                                    </td>
                                </tr>
                                {{-- @endif --}}
                                @endforeach
                            </tbody>
                             <tfoot>
            <tr>
                 <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th>Status</th>
                <th></th> 
            </tr>
        </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- End -->    
    
@include('partials.footer')
