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
                                    Add Project Phase</a> 
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
                                    <table id="" class="table table-bordered dt-responsive nowrap stage" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Project Owner</th>
                                                <th>Project Name</th>
                                                <th>Project Budget</th>
                                                <th>Amount Spent</th>
                                                <th>Disbursed For</th>
                                                <th>Phase</th>
                                                <th>Status</th>
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
                                                <td style='text-align:left'>{!! $item->matpurchased !!}</td>
                                                <td>{!! $item->phase !!}</td>
                                                <td>{!! $item->status !!}</td>
                                                {{-- <td><span class="badge badge-primary">Received</span></td>  --}}
                                                <td>
                                                    <?php $encryptId = Crypt::encrypt($item->id) ?>
                                                    <a href=" {!! route('stage-of-completion.show',$encryptId)!!}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                                                        <i class="bx bxs-analyse"></i>
                                                    </a>
                                                    <a href="{!! route('stage-of-completion.edit',$encryptId) !!}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="bx bx-edit"></i>
                                                        </a>
                                                    <a  href="#" class="d-inline-block text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('delete_client').submit();">
                                                   
                                                    <form id="delete_client" action="{!! route('stage-of-completion.destroy',$encryptId) !!}" method="post" >
                                                        {{ csrf_field() }}
                                                        <input name="_method" type="hidden" value="DELETE">
                                                        <i class="bx bx-trash"></i>
                                                    </form> 
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