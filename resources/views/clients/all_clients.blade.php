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
                        <table class="table">
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
                                <tr>
                                    <td>#6791679</td>
                                    <td class="name">
                                        <img src="assets/img/user1.jpg" alt="image">
                                        Atony Rony
                                    </td>
                                    <td>12 May 2019</td>
                                    <td>$564</td>
                                    <td><span class="badge badge-primary">Received</span></td>
                                </tr>
                                <tr>
                                    <td>#6791674</td>
                                    <td class="name">
                                        <img src="assets/img/user2.jpg" alt="image">
                                        Tom Hardy
                                    </td>
                                    <td>11 May 2019</td>
                                    <td>$954</td>
                                    <td><span class="badge badge-success">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>#6791654</td>
                                    <td class="name">
                                        <img src="assets/img/user3.jpg" alt="image">
                                        Colin Firth
                                    </td>
                                    <td>10 May 2019</td>
                                    <td>$214</td>
                                    <td><span class="badge badge-danger">Declined</span></td>
                                </tr>
                                <tr>
                                    <td>#6791699</td>
                                    <td class="name">
                                        <img src="assets/img/user4.jpg" alt="image">
                                        Jude Law
                                    </td>
                                    <td>09 May 2019</td>
                                    <td>$120</td>
                                    <td><span class="badge badge-success">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>#6791647</td>
                                    <td class="name">
                                        <img src="assets/img/user5.jpg" alt="image">
                                        Idris Elba
                                    </td>
                                    <td>08 May 2019</td>
                                    <td>$999</td>
                                    <td><span class="badge badge-primary">Received</span></td>
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
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
@include('partials.footer')