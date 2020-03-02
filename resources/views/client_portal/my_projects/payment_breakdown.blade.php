    <!-- Begin page -->
    <div id="layout-wrapper" style="margin-top:7px;">
        <hr>
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div>
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Payment Breakdown On: 
                                <b><span class="text-primary">{{{ $pay }}}</span></b></h4>
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
                                    <table id="" class="table table-bordered dt-responsive nowrap clients" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Payment Date</th>
                                                <th>Amount Received</th>
                                                <th>Description</th>
                                                {{-- <th>Action</th> --}}   
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($payments as $payment)
                        
                                            {{-- @if ( $projects->status === "ongoing" ) --}}
                                            <tr>
                                                <td id="client_ids"></td>
                                                <td >{{ $payment->paymentdate }}</span></td>
                                                <td>{{  $payment->amt_received }}</td>    
                                                <td>{{  $payment->comments }}</td>    
                                                {{-- <td> --}}
                                                    <?php //$encryptId = Crypt::encrypt($projects->pid) ?>
                                                    {{-- <a href="#" class="d-inline-block text-success mr-2" 
                                                        data-original-title="view" data-toggle="modal" data-target=".payment-modal">
                                                        <button type="button" class="btn btn-outline-primary btn-sm rounded-pill">View</button>
                                                    </a> --}}
                                                {{-- </td> --}}
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
@include('client_portal.my_projects.payment_modal')


