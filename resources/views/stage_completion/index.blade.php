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
    <!-- Start -->
    <div class="row">
        <div class="col-lg-7 col-md-12">
            <div class="card recent-orders-box mb-30">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>Recent Orders</h3>

                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='bx bx-dots-horizontal-rounded' ></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-show'></i> View
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-edit-alt'></i> Edit
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-trash'></i> Delete
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-printer'></i> Print
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-download'></i> Download
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display" id="">
                            <thead>
                                <tr>
                                    <th>Invoice</th>
                                    <th>Customer</th>
                                    <th>Purchase On</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td>#6791679</td>
                                    <td class="name">
                                        <img src="https://olaf-admin.envytheme.com/assets/img/user1.jpg" alt="image">
                                        Atony Rony
                                    </td>
                                    <td>12 May 2019</td>
                                    <td>$564</td>
                                    <td><span class="badge badge-primary">Received</span></td>
                                </tr>
                                <tr>
                                    <td>#6791674</td>
                                    <td class="name">
                                        <img src="https://olaf-admin.envytheme.com/assets/img/user2.jpg" alt="image">
                                        Tom Hardy
                                    </td>
                                    <td>11 May 2019</td>
                                    <td>$954</td>
                                    <td><span class="badge badge-success">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>#6791654</td>
                                    <td class="name">
                                        <img src="https://olaf-admin.envytheme.com/assets/img/user3.jpg" alt="image">
                                        Colin Firth
                                    </td>
                                    <td>10 May 2019</td>
                                    <td>$214</td>
                                    <td><span class="badge badge-danger">Declined</span></td>
                                </tr>
                                <tr>
                                    <td>#6791699</td>
                                    <td class="name">
                                        <img src="https://olaf-admin.envytheme.com/assets/img/user4.jpg" alt="image">
                                        Jude Law
                                    </td>
                                    <td>09 May 2019</td>
                                    <td>$120</td>
                                    <td><span class="badge badge-success">Pending</span></td>
                                </tr>
                                <tr>
                                    <td>#6791647</td>
                                    <td class="name">
                                        <img src="https://olaf-admin.envytheme.com/assets/img/user5.jpg" alt="image">
                                        Idris Elba
                                    </td>
                                    <td>08 May 2019</td>
                                    <td>$999</td>
                                    <td><span class="badge badge-primary">Received</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-5 col-md-12">
            <div class="card mb-30 new-customer-box">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>New Customers</h3>

                    <div class="dropdown">
                        <button class="dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class='bx bx-dots-horizontal-rounded' ></i>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-show'></i>
                                View
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-edit-alt'></i>
                                Edit
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-trash'></i>
                                Delete
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-printer'></i>
                                Print
                            </a>
                            <a class="dropdown-item d-flex align-items-center" href="#">
                                <i class='bx bx-download'></i>
                                Download
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                    <table class="display" id="" >
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>

                            <tbody>
                                <tr>
                                    <td class="name">
                                        <img src="https://olaf-admin.envytheme.com/assets/img/user1.jpg" alt="image">
                                        Atony Rony
                                    </td>
                                    <td>
                                        <a href="#" class="d-inline-block text-warning mr-2" data-toggle="tooltip" data-placement="top" title="hello@tomhardy.com">
                                            <i class='bx bx-envelope'></i>
                                        </a>
                                        <a href="#" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                        <a href="#" class="d-inline-block text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class='bx bx-trash'></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">
                                        <img src="https://olaf-admin.envytheme.com/assets/img/user2.jpg" alt="image">
                                        Tom Hardy
                                    </td>
                                    <td>
                                        <a href="#" class="d-inline-block text-warning mr-2" data-toggle="tooltip" data-placement="top" title="hello@tomhardy.com">
                                            <i class='bx bx-envelope'></i
                                            ></a>
                                        <a href="#" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                        <a href="#" class="d-inline-block text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class='bx bx-trash'></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">
                                        <img src="https://olaf-admin.envytheme.com/assets/img/user3.jpg" alt="image">
                                        Colin Firth
                                    </td>
                                    <td>
                                        <a href="#" class="d-inline-block text-warning mr-2" data-toggle="tooltip" data-placement="top" title="hello@colinfirth.com">
                                            <i class='bx bx-envelope'></i>
                                        </a>
                                        <a href="#" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                        <a href="#" class="d-inline-block text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class='bx bx-trash'></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">
                                        <img src="https://olaf-admin.envytheme.com/assets/img/user4.jpg" alt="image">
                                        Jude Law
                                    </td>
                                    <td>
                                        <a href="#" class="d-inline-block text-warning mr-2" data-toggle="tooltip" data-placement="top" title="hello@judelaw.com">
                                            <i class='bx bx-envelope'></i>
                                        </a>
                                        <a href="#" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                        <a href="#" class="d-inline-block text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class='bx bx-trash'></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="name">
                                        <img src="https://olaf-admin.envytheme.com/assets/img/user5.jpg" alt="image">
                                        Idris Elba
                                    </td>
                                    <td>
                                        <a href="#" class="d-inline-block text-warning mr-2" data-toggle="tooltip" data-placement="top" title="hello@idriselba.com">
                                            <i class='bx bx-envelope'></i>
                                        </a>
                                        <a href="#" class="d-inline-block text-success mr-2" data-toggle="tooltip" data-placement="top" title="Edit">
                                            <i class='bx bx-edit'></i>
                                        </a>
                                        <a href="#" class="d-inline-block text-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                                            <i class='bx bx-trash'></i>
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