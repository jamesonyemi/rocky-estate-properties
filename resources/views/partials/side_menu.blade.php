      <!-- Side Menu -->
        <!-- Start Sidemenu Area -->
<div class="sidemenu-area">
    <div class="sidemenu-header">
        <a href=" {{ route('home') }} " class="navbar-brand d-flex align-items-center">
        <img src="{{ asset('assets/img/small-logo.png') }}" alt="company logo">
            <span>Olaf</span>
        </a>

        <div class="burger-menu d-none d-lg-block">
            <span class="top-bar"></span>   
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>

        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
    </div>

    <div class="sidemenu-body">
        <ul class="sidemenu-nav metisMenu h-100" id="sidemenu-nav" data-simplebar>
            <li class="nav-item-title">Pages</li>

            <li class="nav-item ">
                <a href=" {{ url('clients') }} " class="nav-link">
                    <span class="icon"><i class='bx bx-user-circle'></i></span>
                    <span class="menu-title">Clients</span>
                </a>
            </li>

            <li class="nav-item ">
                <a href="{{ url('projects') }}" class="nav-link">
                    <span class="icon"><i class='bx bx-help-circle'></i></span>
                    <span class="menu-title">Projects</span>
                </a>
            </li>

            <li class="nav-item ">
                <a href="pages/project-status.html" class="nav-link">
                    <span class="icon"><i class='bx bx-receipt'></i></span>
                    <span class="menu-title">Status</span>
                </a>
            </li>

            <li class="nav-item ">
                <a href="pages/project-report.html" class="nav-link">
                    <span class="icon"><i class='bx bx-images'></i></span>
                    <span class="menu-title">Reports</span>
                </a>
            </li>

            <li class="nav-item ">
                <a href="pages/Users.html" class="nav-link">
                    <span class="icon"><i class='bx bx-align-justify'></i></span>
                    <span class="menu-title">Users</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="pages/Users.html" class="nav-link">
                    <span class="icon"><i class='bx bx-align-justify'></i></span>
                    <span class="menu-title">System Setup</span>
                </a>
            </li>
        </ul>
    </div>
</div>
<!-- End Sidemenu Area -->