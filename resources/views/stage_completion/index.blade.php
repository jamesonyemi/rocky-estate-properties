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
                                <h4 class="mb-0 font-size-18">Summary of Project Phase</h4>
                                <div class="page-title-right">
                                <a href="{{ route('stage-of-completion.create') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >
                                    Add New Phase</a>
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
                                    <div class="card-title-desc divider">  </div>
                                    <table id="" class="table table-bordered dt-responsive nowrap stage" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Owner</th>
                                                <th>Name</th>
                                                <th>Budget</th>
                                                <th>Amt. Spent</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($stageOfCompletion as $item)
                                            <tr>
                                                <td id="stage"></td>
                                                <td style='text-align:left'>  {{ $item->full_name }} </td>
                                                <td style='text-align:left'>  {{ $item->title }} </td>
                                                <td style='text-align:left'>  {!! $item->project_budget !!} </td>
                                                <td style='text-align:left'>  {!! $item->amtspent !!} </td>
                                                <td>
                                                    <?php $encryptId = Crypt::encrypt($item->id) ?>
                                                    <a href=" {!! route('stage-of-completion.show',$encryptId)!!}" class="d-inline-block text-success mr-2" >
                                                        <i class="bx bxs-analyse"></i>
                                                    </a>
                                                    <a href="{!! route('stage-of-completion.edit',$encryptId) !!}" class="d-inline-block text-success mr-2" >
                                                            <i class="bx bx-edit"></i>
                                                        </a>
                                                </td>
                                            </tr>

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