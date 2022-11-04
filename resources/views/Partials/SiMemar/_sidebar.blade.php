<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <a class="sidebar-brand brand-logo text-decoration-none text-white fw-bold"
            href="{{ url('/') }}">{{ $SiMemarConfig->app_name }}</a>
        <a class="sidebar-brand brand-logo-mini text-decoration-none text-white fw-bold"
            href="{{ url('/') }}">{{ str_split($SiMemarConfig->app_name)[0] }}</a>
    </div>
    <ul class="nav">
        <li class="nav-item profile">
            <div class="profile-desc">
                <div class="profile-pic">
                    <div class="count-indicator">
                        @if (is_null(Auth::user()->profile_img))
                            <img class="img-xs rounded-circle " src="{{ asset('/storage') }}/default/avatar.png"
                                alt="{{ Auth::user()->name }}">
                        @else
                            <img class="img-xs rounded-circle "
                                src="{{ asset('/storage') }}/{{ Auth::user()->profile_img }}" alt="">
                        @endif
                        <span class="count bg-success"></span>
                    </div>
                    <div class="profile-name">
                        <h5 class="mb-0 font-weight-normal col-11 text-truncate">{{ Auth::user()->name }}</h5>
                        <span>{{ Auth::user()->role }}</span>
                    </div>
                </div>
            </div>
        </li>

        <li class="nav-item nav-category">
            <span class="nav-link">Navigasi</span>
        </li>
        <li class="nav-item menu-items @if (url('') == Request::fullUrl()) active @endif">
            <a class="nav-link" href="{{ route('Dashboard_index') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-speedometer"></i>
                </span>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item menu-items @if (Request::segment(2) == 'card') active @endif">
            <a class="nav-link" href="{{ route('Account_card') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-account-card-details"></i>
                </span>
                <span class="menu-title">Kartu Anggota</span>
            </a>
        </li>
        <li class="nav-item menu-items @if (Request::segment(2) == 'cv') active @endif">
            <a class="nav-link" href="{{ route('Account_cv') }}">
                <span class="menu-icon">
                    <i class="mdi mdi-file-document"></i>
                </span>
                <span class="menu-title">Upload CV</span>
            </a>
        </li>

        @if (Auth::user()->role == 'CEO')
            <li class="nav-item nav-category">
                <span class="nav-link">Menu CEO</span>
            </li>
            <li class="nav-item menu-items @if (Request::segment(2) == 'pengurus' || Request::segment(2) == 'member') active @endif">
                <a class="nav-link" data-bs-toggle="collapse" href="#admin-account" aria-expanded="false"
                    aria-controls="admin-account">
                    <span class="menu-icon">
                        <i class="mdi mdi-folder-account"></i>
                    </span>
                    <span class="menu-title">Pengelola Akun</span>
                    <i class="menu-arrow"></i>
                </a>
                <div class="collapse @if (Request::segment(2) == 'pengurus' || Request::segment(2) == 'member') show @endif" id="admin-account">
                    <ul class="nav flex-column sub-menu">
                        <li class="nav-item">
                            <a class="nav-link @if (Request::segment(2) == 'member') active @endif"
                                href="{{ route('CEO_member_all') }}">Kelola Member</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link @if (Request::segment(2) == 'pengurus') active @endif"
                                href="{{ route('CEO_pengurus_all') }}">Kelola Pengurus</a>
                        </li>
                    </ul>
                </div>
            </li>
            <li class="nav-item menu-items @if (Request::segment(2) == 'simemar') active @endif">
                <a class="nav-link" href="{{ route('SiMemar_config') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-settings"></i>
                    </span>
                    <span class="menu-title">Pengaturan Website</span>
                </a>
            </li>
        @endif

        @if (Auth::user()->role == 'Pengurus')
            <li class="nav-item nav-category">
                <span class="nav-link">Menu Pengurus</span>
            </li>
            <li class="nav-item menu-items @if (Request::segment(1) == 'pengurus' && Request::segment(2) == 'member') active @endif">
                <a class="nav-link" href="{{ route('Pengurus_member_all') }}">
                    <span class="menu-icon">
                        <i class="mdi mdi-folder-account"></i>
                    </span>
                    <span class="menu-title">Pengelola Akun</span>
                </a>
            </li>
        @endif
    </ul>
</nav>
