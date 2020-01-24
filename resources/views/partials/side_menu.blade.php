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
                <a href="{{ url('onsite-visit/create') }}" class="nav-link">
                    <span class="icon"><i class='bx bx-receipt'></i></span>
                    <span class="menu-title">On Site Visit</span>
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
             <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-lock-open'></i></span>
                    <span class="menu-title">System Setup</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item ">
                        <a href="pages/login.html" class="nav-link">
                            <span class="icon"><i class='bx bx-log-in'></i></span>
                            <span class="menu-title">Login v1</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="pages/login-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-log-in'></i></span>
                            <span class="menu-title">Login v2</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="pages/register.html" class="nav-link">
                            <span class="icon"><i class='bx bx-log-in-circle'></i></span>
                            <span class="menu-title">Register v1</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="pages/register-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-log-in-circle'></i></span>
                            <span class="menu-title">Register v2</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="pages/forgot-password.html" class="nav-link">
                            <span class="icon"><i class='bx bx-lock'></i></span>
                            <span class="menu-title">Forgot Password v1</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="pages/forgot-password-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bx-lock-alt'></i></span>
                            <span class="menu-title">Forgot Password v2</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="pages/reset-password.html" class="nav-link">
                            <span class="icon"><i class='bx bx-log-out'></i></span>
                            <span class="menu-title">Reset Password v1</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="pages/reset-password-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bx-log-out-circle'></i></span>
                            <span class="menu-title">Reset Password v2</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="pages/session-lock-screen.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-lock-open-alt'></i></span>
                            <span class="menu-title">Lock Screen v1</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="pages/session-lock-screen-with-image.html" class="nav-link">
                            <span class="icon"><i class='bx bxs-lock-open'></i></span>
                            <span class="menu-title">Lock Screen v2</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- End Sidemenu Area -->