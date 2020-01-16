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
      <!-- Start -->
      <div class="row">
        <div class="col col-md-12">
            <div class="card recent-orders-box mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Clients</h3>
                    <div>
                        <a href="{{ route('clients.create') }}"> <button type="button" class="btn btn-success btn-sm rounded-pill">New Client</button></a>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table" id="client-datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Location</th>
                                    <th>Project Title</th>
                                    <th>Action</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($all_clients as $client)
                                    @if ( $client->isdeleted === "no" )
                                <tr>
                                    <td>{{ $client->clientid }}</td>
                                    <td class="name">
                                        {{-- <img src="assets/img/user1.jpg" alt="image"> --}}
                                        {{ $client->fname ." ". $client->lname }}
                                    </td>
                                    <td>{{ $client->email }}</td>
                                    <td>{{ $client->phone1 }}</td>
                                    <td>{{ $client->phone2 }}</span></td>
                                    <td>{{ $client->title }}</span></td>
                                    {{-- <td><span class="badge badge-primary">Received</span></td> --}}
                                    <td>
                                        {{-- <a href=" {{ route('clients.show', $client->clientid)}}" class="d-inline-block text-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                                            <i class="bx bx-envelope"></i>
                                        </a> --}}
                                        <a href="{{ route('clients.edit', $client->clientid) }}" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                <i class="bx bx-edit"></i>
                                            </a>
                                        <a  href="#" class="d-inline-block text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"
                                            onclick="event.preventDefault();
                                                     document.getElementById('delete_client').submit();">
                                       
                                        <form id="delete_client" action="{{ route('clients.destroy', $client->clientid) }}" method="post" >
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
        </div>
    </div>
    <!-- End -->    
@include('partials.footer')
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets/js/scrollable_datatable.js')}}" type="text/javascript"></script>