<nav class="navbar top-navbar navbar-expand is-sticky">
    <div class="collapse navbar-collapse" id="navbarSupportContent">
        <div class="responsive-burger-menu d-block d-lg-none">
            <span class="top-bar"></span>
            <span class="middle-bar"></span>
            <span class="bottom-bar"></span>
        </div>
        <ul class="navbar-nav left-nav align-items-center"> </ul>
        <form class="nav-search-form d-none ml-auto d-md-block"> </form>
        <ul class="navbar-nav right-nav align-items-center">
            <li class="nav-item">
                Welcome: {{ Auth::user()->first_name . ' '. Auth::user()->last_name }}
            </li>
        </ul>
    </div>
</nav>