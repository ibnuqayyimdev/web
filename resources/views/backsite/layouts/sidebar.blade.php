<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <a href="#" class="nav-link">
                <div class="nav-profile-image">
                    <img src="{{ asset('PurpleAdmin/') }}/assets/images/faces-clipart/pic-4.png" alt="profile">
                    <span class="login-status online"></span>
                    <!--change to offline or busy as needed-->
                </div>
                <div class="nav-profile-text d-flex flex-column">
                    <span class="font-weight-bold mb-2">{{ auth()->user()->name }}</span>
                    <span class="text-secondary text-small">online</span>
                </div>
                <i class="mdi mdi-bookmark-check text-success nav-profile-badge"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('dashboard') }}">
                <span class="menu-title">Dashboard</span>
                <i class="mdi mdi-view-dashboard menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                aria-controls="ui-basic">
                <span class="menu-title">Contents</span>
                <i class="menu-arrow"></i>
                <i class="mdi mdi-view-dashboard menu-icon"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="#">Buttons</a></li>
                    <li class="nav-item"> <a class="nav-link" href="#">Typography</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('content_settings/list') }}">
                <span class="menu-title">Settings</span>
                <i class="mdi mdi-view-dashboard menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('register-schedule') }}">
                <span class="menu-title">PPDB</span>
                <i class="mdi mdi-view-dashboard menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('profile-sekolah') }}">
                <span class="menu-title">Profile Sekolah</span>
                <i class="mdi mdi-view-dashboard menu-icon"></i> </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('gallery') }}">
                <span class="menu-title">Gallery</span>
                <i class="mdi mdi-view-dashboard menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('tag') }}">
                <span class="menu-title">Tag</span>
                <i class="mdi mdi-view-dashboard menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('category') }}">
                <span class="menu-title">Category</span>
                <i class="mdi mdi-view-dashboard menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('article') }}">
                <span class="menu-title">Article</span>
                <i class="mdi mdi-view-dashboard menu-icon"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('/') }}">
                <span class="menu-title">Kembali Ke Halaman Utama</span>
                <i class="mdi mdi-keyboard-backspace menu-icon"></i>
            </a>
        </li>
    </ul>
</nav>
