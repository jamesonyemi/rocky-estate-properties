
    <!-- Begin page -->
    <div id="layout-wrapper">
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
                                <h4 class="mb-0 font-size-18">Corporate Clients</h4>
                                <div class="page-title-right">
                                <a href="{{ route('clients.create') }}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" > 
                                    New Client</a> 
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
                                    <table id="" class="table table-bordered dt-responsive nowrap corporate" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Company Name</th>
                                                <th>Primary Email</th>
                                                <th>Mobile</th>
                                                <th>Postal Addr.</th>
                                                <th>Residential Addr.</th>
                                                <th>Action</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($corporate as $item) 
                                            <tr>
                                                <td id="corporate_ids"></td>
                                                <td style='text-align:left'>  {{ $item->cc_company_name }} </td>
                                                <td style='text-align:left'>{{ $item->email }}</td>
                                                <td>{{ $item->cc_mobile }}</td>
                                                <td>{{ $item->cc_postal_addr }}</td>
                                                <td>{{ $item->cc_res_addr }}</td>
                                                <td>
                                                    <?php $encryptId = Crypt::encrypt($item->clientid) ?>
                                                    <a href=" {{ route('view-corporate-client',$encryptId)}}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                                                        <i class="bx bxs-analyse"></i>
                                                    </a>
                                                    <a href="{{ route('edit-corporate-client',$encryptId) }}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="bx bx-edit"></i>
                                                        </a>
                                                    <a  href="#" class="d-inline-block text-success" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                                        onclick="event.preventDefault();
                                                                 document.getElementById('delete_client'+ {{ $encryptId }}).submit();">
                                                   
                                                    <form id="{{'delete_client' .$encryptId}}" action="{{ route('delete-corporate-client',$encryptId) }}" method="post" >
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
    <div style="margin-bottom: -50px;"></div>