
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
                        <h4 class="mb-0 font-size-18">Summary of Project Document</h4>
                        <div class="page-title-right">
                        <a href="{{ route('project-docs.create') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" > 
                            New Project Document</a> 
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
                            <div class="card-title-desc divider"></div>   
                            <table id="" class="table table-bordered dt-responsive nowrap stage" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Is Document Available</th>
                                        <th>Is Document Submitted</th>
                                        <th>Created On</th>
                                        <th>Action</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projectDocs as $document)  
                                    <tr>
                                        <td id="stage"></td>
                                        <td style='text-align:left'>  {{ $document->is_ready }} </td>
                                        <td style='text-align:left'>  {{ $document->is_submitted }} </td>
                                        <td style='text-align:left'>  {!! $document->created_date !!} </td>
                                        <td>
                                            <?php $encryptId = Crypt::encrypt($document->id) ?>
                                            <a href=" {!! route('project-docs.show',$encryptId )!!}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                                                <i class="bx bxs-analyse"></i>
                                            </a>
                                            <a href="{!! route('project-docs.edit',$encryptId ) !!}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
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