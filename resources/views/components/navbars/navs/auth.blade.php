@props(['titlePage'])
@php( $notifications = getUserNotification() )
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
    navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            {{-- <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
                <li class="breadcrumb-item text-sm text-dark active" aria-current="page">{{ $titlePage }}</li>
            </ol> --}}
            <h6 class="font-weight-bolder mb-0">{{ $titlePage }}</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                <div class="input-group input-group-outline">
                    <label class="form-label">Search...</label>
                    <input type="text" class="form-control">
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="d-none" id="logout-form">
                @csrf
            </form>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                        <i class="fa fa-user me-sm-1"></i>
                        <span class="d-sm-inline d-none"
                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Sign
                            Out</span>
                    </a>
                </li>
                <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item px-3 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0">
                        <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
                    </a>
                </li>
                <li class="nav-item dropdown pe-2 d-flex align-items-center">
                    <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fa fa-bell cursor-pointer">{{ count($notifications) }}</i>
                    </a>
                    <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4"
                        aria-labelledby="dropdownMenuButton">
                        @if(count($notifications) > 0)
                        @foreach($notifications as $notification)
                        <li class="mb-2">
                            <a class="dropdown-item border-radius-md" href="javascript:;">
                                <div class="d-flex py-1">
                                    <div class="my-auto">
                                        <img src="{{ asset('assets') }}/img/team-2.jpg"
                                            class="avatar avatar-sm bg-gradient-dark  me-3 ">
                                    </div>
                                    <div class="d-flex flex-column justify-content-center">
                                        <h6 class="text-sm font-weight-normal mb-1">
                                            <span class="font-weight-bold">{{ $notification->title }}</span> by {{ $notification->message }}
                                        </h6>
                                        <p class="text-xs text-secondary mb-0">
                                            <i class="fa fa-clock me-1"></i>
                                            {{ $notification->created_at }}
                                        </p>
                                        <p class="text-xs text-secondary mb-0">
                                            <a class="mark_as_read" data-id="{{ $notification->id }}"><i class="fa fa-check me-1">Mark As Read</i></a>
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </li>
                        @endforeach
                        @else
                        <li class="mb-2">
                        <p class="text-xs text-secondary mb-0">No Notification's Found.</p>
                        </li>    
                        @endif
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="position-fixed bottom-1 end-1 z-index-2">
<div class="toast fade hide p-2 mt-2 bg-gradient-success" role="alert" aria-live="assertive" id="infoToast"
            aria-atomic="true" data-delay="2000">
            <div class="toast-header bg-transparent border-0">
                <i class="material-icons text-white me-2">
                check
                </i>
                <span class="me-auto text-white font-weight-bold">Success Message </span>
                <small class="text-white">Just Now</small>
                <i class="fas fa-times text-md text-white ms-3 cursor-pointer" data-bs-dismiss="toast"
                    aria-label="Close"></i>
            </div>
            <hr class="horizontal light m-0">
            <div class="toast-body text-white" id="toast_body_msg">
            </div>
        </div>
</div>