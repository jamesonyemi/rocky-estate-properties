@include('partials.master_header')
<!-- Begin page -->
<br><br><br>
<div id="layout-wrapper">   
    <!-- ============================================================== -->
    <!-- Start right Content here -->
    <!-- ============================================================== -->
    @include('partials.success_alert')
        <div >
            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <div class="page-title-right" style="margin-bottom:15px;">
                                    <h4 class="mb-0 font-size-18">Verified Users</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- start page title -->
                    <div class="card mb-30 button-card-box" style="margin-bottom:20px;">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 style="margin-bottom:-5px;">Action Buttons</h6>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('verified-users.create') }}" 
                            class="btn  btn-outline-primary btn-sm waves-effect waves-light" > 
                                Create User
                            </a> 
                            <a href="#" class="btn btn-outline-primary btn-sm waves-effect waves-light" 
                                data-toggle="modal" data-target=".basicModalSM" >Import Users</a> 
                        </div>
                    </div>
                    <!-- end page title -->

                    <!-- FILTERING BY PROJECT STATUS  -->
                    {{-- <div><span id="filter_status"></span></div> --}}
                    <!-- END OF FILTERING BY PROJECT STATUS-->
                
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc">  </div>   
                                    <table id="" class="table table-bordered dt-responsive nowrap client" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Status</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($verifiedUsers as $user)
                                                {{-- @if ( $user->isdeleted !== "" ) --}}
                                            <tr>
                                                <td id="project_id"></td>
                                                <td >{{ $user->first_name}}</span></td>
                                                <td >{{ $user->last_name}}</span></td>
                                                <td >{{ $user->active}}</span></td>
                                                <td>{{  $user->created_at }}</span></td>
                                                <td>
                                                    <?php $encryptId = Crypt::encrypt($user->id) ?>
                                                    <a href=" {{ route('verified-users.show', $encryptId)}}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                                                        <i class="bx bxs-analyse"></i>
                                                    </a>
                                                    <a href="{{ route('verified-users.edit', $encryptId) }}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="bx bx-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            {{-- @endif --}}
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
@include('users.import_users')
@include('partials.footer')