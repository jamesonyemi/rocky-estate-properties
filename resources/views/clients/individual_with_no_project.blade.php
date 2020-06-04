@include('partials.master_header')
@include('partials.success_alert')

<!-- Begin page -->
 <div id="layout-wrapper">

     <!-- ============================================================== -->
     <!-- Start right Content here -->
     <!-- ============================================================== -->
     <div><br><br>
        <hr style="background-color:fuchsia; opacity:0.1">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18 text-uppercase">All Individual Clients</h4>
                            <div class="page-title-right">
                                <a href="{!! url()->previous()!!}" class="btn  btn-outline-primary btn-sm waves-effect waves-light" >Back</a>
                            </div>
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
                                <table id="" class="table table-bordered dt-responsive nowrap client" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            {{-- <th>Nationality</th> --}}
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($clientWithZeroProject as $item)
                                        @if ( empty($item->cc_company_name) )
                                            <td id="client_id"></td>
                                            <td style='text-align:left'>  {{ $item->fname ." ". $item->lname }} </td>
                                            <td style='text-align:left'>{{ $item->email }}</td>
                                            <td>{{ $item->phone1 }}</td>
                                            {{-- <td>{{ ($item->nationality === $key) ? $country_name : "" }}</td> --}}
                                            <td>
                                                <?php $encryptId = Crypt::encrypt($item->clientid) ?>
                                                <a href=" {{ route('clients.show', $encryptId)}}" class="d-inline-block text-success mr-2">
                                                    <i class="bx bxs-analyse"></i>
                                                </a>
                                                <a href="{{ route('clients.edit', $encryptId) }}" class="d-inline-block text-success mr-2">
                                                        <i class="bx bx-edit"></i>
                                                    </a>
                                                <a  href="#" class="d-inline-block text-success"
                                                onclick="event.preventDefault();
                                                        document.getElementById('delete').submit();">

                                                <form id="delete" action="{{ route('clients.destroy', $encryptId) }}" method="post" >
                                                    {{ csrf_field() }}
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <input type="hidden" name="active" id="active">
                                                    <input type="hidden" name="isdeleted" id="isdeleted">
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
@include('partials.footer')
