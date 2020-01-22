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
                                <h4 class="mb-0 font-size-18">All Projects</h4>
                                <div class="page-title-right">
                                <a href="{{ route('clients.create') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" > 
                                    New Project</a> 
                                </div>
                            </div>
                        </div>
                    </div><br>
                    <!-- end page title -->

                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc divider">  </div    >   
                                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Full Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Location</th>
                                                <th>Project Title</th>
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($all_clients as $client)
                                                {{-- @if ( $client->isdeleted === "no" ) --}}
                                            <tr>
                                                <td style='text-align:left'>{{ $client->clientid }}</td>
                                                <td style='text-align:left'>
                                                    {{-- <img src="assets/img/user1.jpg" alt="image"> --}}
                                                    {{ $client->fname ." ". $client->lname }}
                                                </td>
                                                <td style='text-align:left'>{{ $client->email }}</td>
                                                <td>{{ $client->phone1 }}</td>
                                                <td>{{ $client->phone2 }}</span></td>
                                                <td>{{ $client->title }}</span></td>
                                                {{-- <td><span class="badge badge-primary">Received</span></td> --}}
                                                <td>
                                                    <a href=" {{ route('clients.show', $client->clientid)}}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                                                        <i data-feather="eye"></i>
                                                    </a>
                                                    <a href="{{ route('clients.edit', $client->clientid) }}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="bx bx-edit"></i>
                                                        </a>
                                                    <a  href="#" class="d-inline-block text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('delete_client').submit();">
                                                   
                                                    <form id="delete_client" action="{{ route('clients.destroy', $client->clientid) }}" method="post" >
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