@props(['activePage'])

<aside
    class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
    id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
            aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0 d-flex text-wrap align-items-center" href=" {{ route('dashboard') }} ">
            <img src="{{ asset('assets') }}/img/next-gen.png" class="navbar-brand-img h-100" alt="main_logo">
            {{-- <span class="ms-2 font-weight-bold text-white"></span> --}}
        </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Dashboard Users</h6>
            </li> --}}
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'dashboard' ? ' active bg-gradient-dark ' : '' }} "
                    href="{{ route('dashboard') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">dashboard</i>
                    </div>
                    <span class="nav-link-text ms-1">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'dashboard-stat' ? ' active bg-gradient-dark ' : '' }} "
                    href="{{ route('dashboard.stat') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">equalizer</i>
                    </div>
                    <span class="nav-link-text ms-1">BoothWatch Live</span>
                </a>
            </li>
            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesExamples" class="nav-link text-white collapsed {{ $activePage == 'states' ? ' active bg-gradient-dark ' : '' }} {{ $activePage == 'events' ? ' active bg-gradient-dark ' : '' }} {{ $activePage == 'districts' ? ' active bg-gradient-dark ' : '' }} {{ $activePage == 'booth' ? ' active bg-gradient-dark ' : '' }}  {{ $activePage == 'manage-assembly' ? ' active bg-gradient-dark ' : '' }} {{ $activePage == 'election-info' ? ' active bg-gradient-dark ' : '' }} {{ $activePage == 'parliament' ? ' active bg-gradient-dark ' : '' }} {{ $activePage == 'sector-officer' ? ' active bg-gradient-dark ' : '' }}"  aria-controls="pagesExamples" role="button" aria-expanded="false">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">install_desktop</i>
                    </div>
                    <span class="nav-link-text ms-1">Masters</span>
                </a>
                <div class="collapse {{ $activePage == 'booth' ? 'show' : '' }} {{ $activePage == 'manage-assembly' ? 'show' : '' }} {{ $activePage == 'events' ? 'show' : '' }} {{ $activePage == 'states' ? 'show' : '' }} {{ $activePage == 'districts' ? 'show' : '' }} {{ $activePage == 'election-info' ? 'show' : '' }} {{ $activePage == 'parliament' ? 'show' : '' }} {{ $activePage == 'sector-officer' ? 'show' : '' }} "  id="pagesExamples" style="">
                    <ul class="nav ms-4">
                        @can('assembly-list')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'manage-assembly' ? ' active bg-gradient-dark ' : '' }}  "
                                href="{{ route('assemblies') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">diversity_2</i>
                                </div>
                                <span class="nav-link-text ms-1">Manage Assemblies</span>
                            </a>
                        </li>
                        @endcan
                        @can('booth-list')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'booth' ? ' active bg-gradient-dark ' : '' }}  "
                                href="{{ route('booth') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">bedroom_child</i>
                                </div>
                                <span class="nav-link-text ms-1">Manage Booths</span>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'sector-officer' ? ' active bg-gradient-dark ' : '' }}  "
                                href="{{ route('so.index') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">business</i>
                                </div>
                                <span class="nav-link-text ms-1">Manage Sector Officer</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'parliament' ? ' active bg-gradient-dark ' : '' }}  "
                                href="{{ route('parliaments.index') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">cottage</i>
                                </div>
                                <span class="nav-link-text ms-1">Manage Parliament</span>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'district' ? ' active bg-gradient-dark ' : '' }}  "
                                href="{{ route('booth') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                                </div>
                                <span class="nav-link-text ms-1">Manage District</span>
                            </a> --}}
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'states' ? ' active bg-gradient-dark ' : '' }}  "
                                href="{{ route('states') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">house</i>
                                </div>
                                <span class="nav-link-text ms-1">Manage State</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'districts' ? ' active bg-gradient-dark ' : '' }}  "
                                href="{{ route('districts') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">bungalow</i>
                                </div>
                                <span class="nav-link-text ms-1">Manage District</span>
                            </a>
                        </li>
                        @can('event-list')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'events' ? ' active bg-gradient-dark' : '' }}  "
                                href="{{ route('events') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                                </div>
                                <span class="nav-link-text ms-1">Manage Events</span>
                            </a>
                        </li>
                        @endcan
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'map_booth' ? ' active bg-gradient-dark' : '' }}"
                                href="{{ route('map_booth') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                                </div>
                                <span class="nav-link-text ms-1">Map Booth</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'election-info' ? ' active bg-gradient-dark' : '' }}"
                                href="{{ route('election-info') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                                </div>
                                <span class="nav-link-text ms-1">Election Info</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'notifications' ? ' active bg-gradient-dark' : '' }}"
                                href="{{ route('notifications') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                                </div>
                                <span class="nav-link-text ms-1">Notifications</span>
                            </a>
                        </li>
                        {{-- multiple toggle --}}
                        {{-- <li class="nav-item ">
                            <a class="nav-link text-white {{ $activePage == 'permissions' ? ' active bg-gradient-dark ' : '' }}" data-bs-toggle="collapse" aria-expanded="false" href="#accountExample">
                                <span class="sidenav-mini-icon"> A </span>
                                <span class="sidenav-normal"> Roles <b class="caret"></b></span>
                            </a>
                            <div class="collapse " id="accountExample">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link " href="https://argon-dashboard-pro-laravel.creative-tim.com/pages/account/settings">
                                            <span class="sidenav-mini-icon text-xs"> S </span>
                                            <span class="sidenav-normal"> Settings </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="https://argon-dashboard-pro-laravel.creative-tim.com/pages/account/billing">
                                            <span class="sidenav-mini-icon text-xs"> B </span>
                                            <span class="sidenav-normal"> Billing </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="https://argon-dashboard-pro-laravel.creative-tim.com/pages/account/invoice">
                                            <span class="sidenav-mini-icon text-xs"> I </span>
                                            <span class="sidenav-normal"> Invoice </span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="https://argon-dashboard-pro-laravel.creative-tim.com/pages/account/security">
                                            <span class="sidenav-mini-icon text-xs"> S </span>
                                            <span class="sidenav-normal"> Security </span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                    </ul>
                </div>
            </li>

            <li class="nav-item">
                <a data-bs-toggle="collapse" href="#pagesExamples1" class="nav-link text-white collapsed {{ $activePage == 'permissions' ? ' active bg-gradient-dark ' : '' }} {{ $activePage == 'roles' ? ' active bg-gradient-dark ' : '' }} {{ $activePage == 'users' ? ' active bg-gradient-dark ' : '' }}"  aria-controls="pagesExamples" role="button" aria-expanded="false">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">supervised_user_circle</i>
                    </div>
                    <span class="nav-link-text ms-1">User Management</span>
                </a>
                <div class="collapse {{ $activePage == 'roles' ? 'show' : '' }} {{ $activePage == 'permissions' ? 'show' : '' }} {{ $activePage == 'users' ? 'show' : '' }}"  id="pagesExamples1" style="">
                    <ul class="nav ms-4">
                        @can('user-list')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'users' ? ' active bg-gradient-dark ' : '' }} "
                                href="{{ route('users.index') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">people</i>
                                </div>
                                <span class="nav-link-text ms-1">Manage User</span>
                            </a>
                        </li>
                        @endcan
                        @can('role-list')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'roles' ? ' active bg-gradient-dark ' : '' }}"
                                href="{{ route('roles.index') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">boy</i>
                                </div>
                                <span class="nav-link-text ms-1">Manage Roles</span>
                            </a>
                        </li>
                        @endcan
                        @can('permission-list')
                        <li class="nav-item">
                            <a class="nav-link text-white {{ $activePage == 'permissions' ? ' active bg-gradient-dark ' : '' }}"
                                href="{{ route('permissions.index') }}">
                                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                                    <i class="material-icons opacity-10">person</i>
                                </div>
                                <span class="nav-link-text ms-1">Manage Permissions</span>
                            </a>
                        </li>
                        @endcan
                    </ul>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'user-profile' ? 'active bg-gradient-dark ' : '' }} "
                    href="{{ route('user-profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">User Profile</span>
                </a>
            </li>

            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Pages</h6>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'tables' ? ' active bg-gradient-dark ' : '' }} "
                    href="{{ route('tables') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">table_view</i>
                    </div>
                    <span class="nav-link-text ms-1">Tables</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'virtual-reality' ? ' active bg-gradient-dark ' : '' }}  "
                    href="{{ route('virtual-reality') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">view_in_ar</i>
                    </div>
                    <span class="nav-link-text ms-1">Virtual Reality</span>
                </a>
            </li> --}}

            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'rtl' ? ' active bg-gradient-dark ' : '' }}  "
                    href="{{ route('rtl') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">format_textdirection_r_to_l</i>
                    </div>
                    <span class="nav-link-text ms-1">RTL</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'notifications' ? ' active bg-gradient-dark ' : '' }}  "
                    href="{{ route('notifications') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">notifications</i>
                    </div>
                    <span class="nav-link-text ms-1">Notifications</span>
                </a>
            </li> --}}
            {{-- <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account pages</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white {{ $activePage == 'profile' ? ' active bg-gradient-dark ' : '' }}  "
                    href="{{ route('profile') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">person</i>
                    </div>
                    <span class="nav-link-text ms-1">Profile</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-in') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">login</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign In</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white " href="{{ route('static-sign-up') }}">
                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="material-icons opacity-10">assignment</i>
                    </div>
                    <span class="nav-link-text ms-1">Sign Up</span>
                </a>
            </li> --}}
        </ul>
    </div>
</aside>
