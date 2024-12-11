<meta charset="utf-8" />
<title>@if($pageTitle) {{ $pageTitle }} | @endif {{ __('global.app_name') }}</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="AG FINANCIAL" name="description" />
<meta content="AG FINANCIAL" name="author" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- App favicon -->
<link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
<!-- App css -->
<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/preloader.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/select2/select2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/bootstrap-select/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/libs/jquery-toast/jquery.toast.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugin/jquery-confirm/jquery-confirm.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css" />

<style>
    #sidebar-menu>ul>li>a.active
    {
        color: #ffd15e !important;logo-img
    }

    .nav-second-level li.active>a, .nav-third-level li.active>a
    {
        color: #ffd15e !important;
    }

    .spinner{
        border-left: 5px solid #343533 !important;
    }
    .left-side-menu
    {
        background: #5a5959 !important;
    }
    .navbar-custom {
        background-color: #343533 !important;
    }
    #sidebar-menu .menu-title
    {
        color: #f5f6f8 !important;
    }
    #sidebar-menu>ul>li>a {
        color: #f5f6f8 !important;
    }
    .page-title-box .page-title
    {
        color: #323a46 !important;
    }
    .nav-second-level li a, .nav-thrid-level li a
    {
        color:white;
    }
    .enlarged .left-side-menu #sidebar-menu>ul>li>a
    {
        background-color: #5a5959 !important;
    }
    .item-hide
    {
        display: none !important;
    }
    #side-menu > li > ul.nav-second-level
    {
        background-color: #5a5959 !important;
    }
    .footer
    {
        background-color: #343533 !important;
    }
    /*.dropdown-menu-right {*/
    /*    left: 0 !important;*/
    /*}*/
    @media (max-width: 768px) {
        .dropdown-lg {
            width: 320px;
        }
        .navbar-custom .dropdown .dropdown-menu {
            left: 0px!important;
            width: 95% !important;
        }
    }

    @media (max-width: 600px) {
        .navbar-custom .dropdown {
            position: static;
        }
        .navbar-custom .dropdown .dropdown-menu {
            left: 10px!important;
            right: 10px!important;
            width: 95% !important;
        }
    }

    @media (min-width: 600px)
    {
        .dropdown-lg {
            width: 320px;
        }
    }

</style>