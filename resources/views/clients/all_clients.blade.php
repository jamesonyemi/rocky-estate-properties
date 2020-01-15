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

    @if ( $message = Session::get('success') )
    <div class="alert alert-success rounded-pill" role="alert">
            {{ $message }}
        </div>
    @endif
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
                        <table class="table" id="client-data">
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
                                        <a href="#" class="d-inline-block text-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="view">
                                            <i class="bx bx-envelope"></i>
                                        </a>
                                        <a href="#" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                            <i class="bx bx-edit"></i>
                                        </a>
                                        <a href="#" class="d-inline-block text-danger" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                            <i class="bx bx-trash"></i>
                                        </a>
                                    </td>
                                </tr>
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