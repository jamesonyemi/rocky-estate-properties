@include('partials.master_header')

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
                                <h4 class="mb-0 font-size-18">All Branches</h4>
                                <div class="page-title-right">
                                <a href="{{ route('currency.create') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" > 
                                    New Branch</a> 
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
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
                                                <th>Branch Name</th>
                                                <th>Branch Name</th>
                                                <th>Currency Name</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            @foreach ($currency as $curType)
                                                @if ( $curType->isdeleted !== "" )
                                            <tr>
                                                <td id="project_id"></td>
                                                <td >{{ $curType->short_name}}</span></td>
                                                <td >{{ $curType->id}}</span></td>
                                                <td>{{ $curType->long_name }}</span></td>
                                                <td>
                                                    <a href=" {{ route('currency.show', $curType->id)}}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                                                        <i class="bx bxs-analyse"></i>
                                                    </a>
                                                    <a href="{{ route('currency.edit', $curType->id) }}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="bx bx-edit"></i>
                                                        </a>
                                                 <a  href="#" class="d-inline-block text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('delete'+ {{ $curType->id }} ).submit();">
                                                   
                                                    <form id="{{'delete' .$curType->id}}" action="{{ route('currency.destroy', $curType->id) }}" method="post" >
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