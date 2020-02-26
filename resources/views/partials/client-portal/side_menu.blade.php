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
                <a href=" {{ url('/client-portal/personal-details') }} " class="nav-link">
                    <span class="icon"><i class='bx bx-user-circle'></i></span>
                    <span class="menu-title">Personal Details</span>
                </a>
            </li>

            <li class="nav-item ">
                <a href="{{ url('projects') }}" class="nav-link">
                    <span class="icon"><i class='bx bx-briefcase-alt-2'></i></span>
                    <span class="menu-title">My Projects</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ url('project-docs') }}" class="nav-link">
                    <span class="icon"><i class='bx bx-briefcase-alt-2'></i></span>
                    <span class="menu-title">My Documents</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ url('onsite-visit') }}" class="nav-link">
                    <span class="icon"><i class=' bx bx-building-house'></i></span>
                    <span class="menu-title">OnSite Visits</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ url('stage-of-completion') }}" class="nav-link">
                    <span class="icon"><i class='bx bxs-news'></i></span>
                    <span class="menu-title">Stages of Completion</span>
                </a>
            </li>
            <li class="nav-item ">
                <a href="{{ url('payments') }}" class="nav-link">
                    <span class="icon"><i class='bx bx-dollar'></i></span>
                    <span class="menu-title">Payments</span>
                </a>
            </li>
            <li class="nav-item mm-active">
                <a href="{{ url('tracking') }}" class="nav-link" aria-expanded="true">
                    <span class="icon"><i class="bx bx-align-justify"></i></span>
                    <span class="menu-title">Tracking</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();">
                  <i class='bx bx-log-out'></i> <span>Logout</span>
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
              </form>
          </li>
        </ul>
    </div>
</div>
<!-- End Sidemenu Area -->