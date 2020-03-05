@include('partials.client-portal.master_header')
    <!-- Begin page -->
    <div id="layout-wrapper" style="margin-top:50px;">   
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div>
            <div class="page-content">
                <div class="container-fluid">

                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            {{-- <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">All Payments</h4>
                                <div class="page-title-right">
                                <a href="{{ route('payments.create') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-lightD" > 
                                    New Payment</a> 
                                    <a href="{{ route('additional-cost') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" > 
                                        Addition Cost</a> 
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <br>
                    <!-- end page title -->

                    <!-- FILTERING BY PROJECT STATUS  -->
                    {{-- <div><span id="filter_status"></span></div> --}}
                    <!-- END OF FILTERING BY PROJECT STATUS-->
                   
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body table-responsive">
                                    <h4 class="card-title">Payments</h4>
                                    <table id="" class="table table-bordered" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Project Title</th>
                                                <th>Payment Date</th>
                                                <th>Amount Received</th>
                                                <th>Mode</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            
                                            @foreach ($payments as $key => $payment)
                                                {{-- @if ( $payment->isdeleted !== "" ) --}}
                                            <tr>
                                                <td class="text-center"> {{ ( $data["currentPage"] - 1 ) * $data["perPage"] + $key + 1 }}</td>
                                                <td >{{ $payment->title }}</span></td>
                                                <td >{{ $payment->paymentdate }}</span></td>
                                                <td >{{ $payment->amt_received }}</span></td>
                                                <td>{{  $payment->paymentmode }}</span></td>
                                                {{-- <td>
                                                   
                                                    <a href=" {{ route('payments.show', $encryptId)}}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                                                        <i class="bx bxs-analyse"></i>
                                                    </a>
                                                    <a href="{{ route('payments.edit', $encryptId) }}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="bx bx-edit"></i>
                                                    </a>
                                                </td> --}}
                                            </tr>
                                            {{-- @endif --}}
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                     <!-- Pagination-Counter-Start -->
                                    <div class="col-md-6">
                                        <nav>
                                            <ul class="pagination justify-content-start"> Page {!! ( $data["currentPage"] ) !!} of {!! $data["total"] !!} </ul>
                                        </nav>
                                    </div>
                                     <!-- Pagination-Counter-End -->

                                    <!-- Pagination-Start -->
                                    <div class="col-md-6">
                                        <nav> 
                                            <ul class="pagination justify-content-end">{!! $payments->links() !!} </ul>
                                        </nav>
                                    </div>
                                    <!-- Pagination-End -->
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
@include('partials.client-portal.footer')