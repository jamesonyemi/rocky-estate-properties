@include('partials.master_header')
    @include('partials.breadcrumb')
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
                                <h4 class="mb-0 font-size-18">Available User Roles</h4>
                                <div class="page-title-right">
                                    <a href="{{ route('role.create') }}" class="btn btn-outline-primary btn-sm waves-effect waves-light" >
                                        Create Role</a>
                                        <a href="{{ route('assign-role') }}" class="btn btn-outline-primary btn-sm waves-effect waves-light" >
                                            Assign Role to User</a>
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
                                    <h4 class="card-title"></h4>
                                    <div class="card-title-desc">  </div>
                                    <table id="" class="table table-bordered dt-responsive nowrap client" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($roles as $role)
                                            <?php $encryptId = Crypt::encrypt($role->id) ?>
                                                @if ( $role->isdeleted === 0  )
                                            <tr>
                                                <td id="client_id"></td>
                                                <td >
                                                    <a href=" {{ route('role.show', $encryptId)}}" class="mr-2 nav-link" >
                                                    {{ ucfirst($role->type) }}
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href=" {{ route('role.show', $encryptId)}}" class="mr-2 d-inline-block text-success" >
                                                        <i class="bx bxs-analyse"></i>
                                                    </a>
                                                    <a href="{{ route('role.edit', $encryptId) }}" class="mr-2 d-inline-block text-success" >
                                                            <i class="bx bx-edit"></i>
                                                        </a>
                                                 <a  href="#" class="d-inline-block text-success"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('delete'+ {{ $encryptId }} ).submit();">

                                                    <form id="{{'delete'.$encryptId }}" action="{{ route('role.destroy', $encryptId) }}" method="post" >
                                                        {{ csrf_field() }}
                                                        <input name="_method" type="hidden" value="DELETE">
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