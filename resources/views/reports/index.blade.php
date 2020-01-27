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
        <div class="col-lg-3 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box" style="background-color:#28a745">
                    <i class='bx bxs-briefcase-alt-2'></i>
                </div>
                <span class="sub-title">Completed Projects</span>
                {{-- <h3>5.45% <span class="badge"><i class='bx bx-up-arrow-alt'></i> 56.9%</span></h3> --}}

                <div class="progress-list">
                    <div class="bar-inner">
                        <div class="bar progress-line" data-width="56.9"></div>
                    </div>

                    {{-- <p>Ratio website’s visitors</p> --}}
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box" style="background-color:#3a79ec">
                    <i class='bx bx-briefcase-alt-2'></i>
                </div>
                <span class="sub-title">Ongoing Projects</span>
                {{-- <h3>4.75% <span class="badge"><i class='bx bx-up-arrow-alt'></i> 32.1%</span></h3> --}}

                <div class="progress-list">
                    <div class="bar-inner">
                        <div class="bar progress-line" data-width="32.1"></div>
                    </div>

                    {{-- <p>Ratio website’s visitors</p> --}}
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box" style="background-color:#e1000a;">
                    <i class='bx bx-briefcase-alt-2'></i>
                </div>
                <span class="sub-title">Cancelled Projects</span>
                {{-- <h3>6.47% <span class="badge badge-red"><i class='bx bx-down-arrow-alt'></i> 45.5%</span></h3> --}}

                <div class="progress-list">
                    <div class="bar-inner">
                        <div class="bar progress-line" data-width="45.5"></div>
                    </div>

                    {{-- <p>Ratio website’s visitors</p> --}}
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box" style="background-color:#6a7684;">
                    <i class='bx bx-briefcase-alt-2'></i>
                </div>
                <span class="sub-title">Stalled Projects</span>
                {{-- <h3>92.6% <span class="badge"><i class='bx bx-up-arrow-alt'></i> 26.0%</span></h3> --}}

                <div class="progress-list">
                    <div class="bar-inner">
                        <div class="bar progress-line" data-width="26.0"></div>
                    </div>

                    {{-- <p>Subscribe in month</p> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
     <!-- Start -->
    <div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box" style="background-color:#1e8d9e;">
                    <i class=' bx bx-current-location'></i>
                </div>
                <span class="sub-title">Projects by Location</span>
                {{-- <h3>5.45% <span class="badge"><i class='bx bx-up-arrow-alt'></i> 56.9%</span></h3> --}}

                <div class="progress-list">
                    <div class="bar-inner">
                        <div class="bar progress-line" data-width="56.9"></div>
                    </div>

                    {{-- <p>Ratio website’s visitors</p> --}}
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box" style="background-color:#373394">
                    <i class='bx bxs-purchase-tag-alt'></i>
                </div>
                <span class="sub-title">Materials Purchased</span>
                {{-- <h3>4.75% <span class="badge"><i class='bx bx-up-arrow-alt'></i> 32.1%</span></h3> --}}

                <div class="progress-list">
                    <div class="bar-inner">
                        <div class="bar progress-line" data-width="32.1"></div>
                    </div>

                    {{-- <p>Ratio website’s visitors</p> --}}
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box" style="background-color:#29883f">
                    {{-- <i class='bx bx-money'></i> --}}
                    <i class='bx bxs-bank'></i>
                </div>
                <span class="sub-title">Total Payments & Balances</span>
                {{-- <h3>6.47% <span class="badge badge-red"><i class='bx bx-down-arrow-alt'></i> 45.5%</span></h3> --}}

                <div class="progress-list">
                    <div class="bar-inner">
                        <div class="bar progress-line" data-width="45.5"></div>
                    </div>

                    {{-- <p>Ratio website’s visitors</p> --}}
                </div>
            </div>
        </div>

        <div class="col-lg-3 col-md-6">
            <div class="stats-card-box">
                <div class="icon-box">
                    <i class='bx bx-git-branch'></i>
                </div>
                <span class="sub-title">Branches</span>
                {{-- <h3>92.6% <span class="badge"><i class='bx bx-up-arrow-alt'></i> 26.0%</span></h3> --}}

                <div class="progress-list">
                    <div class="bar-inner">
                        <div class="bar progress-line" data-width="86.0"></div>
                    </div>

                    {{-- <p>Subscribe in month</p> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- End -->
    @include('partials.footer')
