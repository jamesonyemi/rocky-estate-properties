
    <!-- Begin page -->
    <div id="layout-wrapper">
        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div>
            <div class="page-content">
                <div class="container-fluid">
                    <!-- start page title -->
                    <div class="row mt-5">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18 text-uppercase">Corporate Clients With Project</h4>
                                <div class="col-6"></div>
                                {{-- <div class="page-title-right">
                                    <a href="{!! url('admin-portal/corporate-client-wnp') !!}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >Without Project</a>
                                    </div> --}}
                                    <div class="col-0"></div>
                                <div class="page-title-right">
                                <a href="{!! url()->previous()!!}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >Back</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <!-- end page title -->
                    <div class="row">
                        <div class="col-12">
                            {{-- @foreach ($clientWithProjects as $item)

                                {{ ddd($item)}}
                                @endforeach --}}
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
                                            @foreach ($clientWithProjects as $item)
                                            <?php $encryptId = Crypt::encrypt($item->clientid) ?>
                                            @if ( !empty($item->cc_company_name))
                                            <tr>
                                                <td id="corporate_ids"></td>
                                                <td style='text-align:left'>
                                                    <a href=" {{ route('view-corporate-client',$encryptId)}}" class="d-inline-block  mr-2 nav-link">
                                                     {{ $item->cc_company_name }}
                                                    </a>
                                                    </td>
                                                <td style='text-align:left'>
                                                    <a href=" {{ route('view-corporate-client',$encryptId)}}" class="d-inline-block  mr-2 nav-link">
                                                    {{ $item->client_email }}
                                                    </a>
                                                </td>
                                                <td>{{ $item->cc_mobile }}</td>
                                                <td>{{ $item->cc_postal_addr }}</td>
                                                <td>{{ $item->cc_res_addr }}</td>
                                                <td>
                                                    <a href=" {{ route('view-corporate-client',$encryptId)}}" class="d-inline-block text-success mr-2">
                                                        <i class="bx bxs-analyse"></i>
                                                    </a>
                                                    <a href="{{ route('edit-corporate-client',$encryptId) }}" class="d-inline-block text-success mr-2">
                                                        <i class="bx bx-edit"></i>
                                                        </a>
                                                    <a  href="#" class="d-inline-block text-success"
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
    <div style="margin-bottom: -50px;"></div>