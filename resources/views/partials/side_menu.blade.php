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
                <a href=" {{ url('/admin-portal/clients') }} " class="nav-link">
                    <span class="icon"><i class='bx bx-user-circle'></i></span>
                    <span class="menu-title">Clients</span>
                </a>
            </li>

            <li class="nav-item ">
                <a href="{{ url('/admin-portal/projects') }}" class="nav-link">
                    <span class="icon"><i class='bx bx-briefcase-alt-2'></i></span>
                    <span class="menu-title">Projects</span>
                </a>
            </li>
            @if ( Auth::user()->role_id === 1 || Auth::user()->role_id === 2 )
            <li class="nav-item ">
                <a href="{{ url('/admin-portal/project-docs') }}" class="nav-link">
                    <span class="icon"><i class='bx bx-briefcase-alt-2'></i></span>
                    <span class="menu-title">Documents</span>
                </a>
            </li>
            @endif
            <li class="nav-item ">
                <a href="{{ url('/admin-portal/onsite-visit') }}" class="nav-link">
                    <span class="icon"><i class=' bx bx-building-house'></i></span>
                    <span class="menu-title">On Site Visits</span>
                </a>
            </li>

            <li class="nav-item ">
                <a href="{{ url('/admin-portal/reports') }}" class="nav-link">
                    <span class="icon"><i class=' bx bx-bar-chart'></i></span>
                    <span class="menu-title">Reports</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ url('/admin-portal/stage-of-completion') }}" class="nav-link">
                    <span class="icon"><i class='bx bxs-news'></i></span>
                    <span class="menu-title">Stages of Completion</span>
                </a>
            </li>

            <li class="nav-item ">
                <a href="{{ url('/admin-portal/verified-users') }}" class="nav-link">
                    <span class="icon"><i class=' bx bxs-user-detail'></i></span>
                    <span class="menu-title">Users</span>
                </a>
            </li>
            @if ( Auth::user()->role_id === 1 || Auth::user()->role_id === 2 )
            <li class="nav-item ">
                <a href="{{ url('/admin-portal/payments') }}" class="nav-link">
                    <span class="icon"><i class='' style="font-size: 10.5px; font-weight:bold;
                        font-style: normal;"> GH₵</i></span>
                    <span class="menu-title">Payments</span>
                </a>
            </li>
            @endif
             <li class="nav-item">
                <a href="#" class="collapsed-nav-link nav-link" aria-expanded="false">
                    <span class="icon"><i class='bx bx-lock-open'></i></span>
                    <span class="menu-title">System Setup</span>
                </a>

                <ul class="sidemenu-nav-second-level">
                    <li class="nav-item ">
                        <a href="{{ url('/admin-portal/system-setup/towns') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-log-in'></i></span>
                            <span class="menu-title">Towns</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href=" {{ url('/admin-portal/system-setup/nationality') }}" class="nav-link">
                            <span class="icon"><i class='bx bxs-log-in'></i></span>
                            <span class="menu-title">Nationality</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href="{{ url('/admin-portal/system-setup/title') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-log-in-circle'></i></span>
                            <span class="menu-title">Title</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href=" {{ url('/admin-portal/system-setup/currency') }}" class="nav-link">
                            <span class="icon"><i class='bx bxs-log-in-circle'></i></span>
                            <span class="menu-title">Currency</span>
                        </a>
                    </li>

                    <li class="nav-item ">
                        <a href=" {{ url('/admin-portal/system-setup/role') }}" class="nav-link">
                            <span class="icon"><i class='bx bx-lock'></i></span>
                            <span class="menu-title">Assign Role to User</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<!-- End Sidemenu Area -->