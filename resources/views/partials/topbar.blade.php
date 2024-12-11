<ul class="list-unstyled topnav-menu float-right mb-0">
    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <i class="fe-bell noti-icon"></i>
                <span class="badge badge-danger rounded-circle noti-icon-badge border-radius-10">0</span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-lg">
            <!-- item-->
            <div class="dropdown-item noti-title">
                <h5 class="m-0">
                    <span class="float-right">
{{--                        <a href="" class="text-dark">--}}
{{--                            <small>@lang('global.clear_all')</small>--}}
{{--                        </a>--}}
                    </span>@lang('global.msg.notifications')
                </h5>
            </div>

            <div class="slimscroll noti-scroll">
                <a href="javascript:void(0);" class="dropdown-item notify-item">
                    <p class="notify-details m-auto">
                        @lang('global.msg.no_notification')
                    </p>
                </a>
                    {{--  <!-- item-->
                    <a href="" class="dropdown-item notify-item" title="">
                        <div class="notify-icon bg-warning">
                            <i class="fe-user-check"></i>
                        </div>
                        <p class="notify-details"><label class="text-dark"></label><br>
                            <small class="text-muted"></small>
                        </p>
                    </a>  --}}
            </div>
            <!-- All-->
            <a href="javascript:void(0);" class="dropdown-item text-center text-blue notify-item notify-all">
                @lang('global.msg.view_logs')
                <i class="fi-arrow-right"></i>
            </a>
        </div>
    </li>
    <li class="dropdown notification-list">
        <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
            <img src="@if(is_null(Auth::user()->avatar) || empty(Auth::user()->avatar)){{ asset('assets/images/users/default.png') }}@else{{ asset('storage/images/avatars')."/".Auth::user()->avatar }}@endif"
            alt="user-image" class="rounded-circle">
            <span class="pro-user-name ml-1">
                {{ Auth::user()->nome }} <i class="mdi mdi-chevron-down"></i>
            </span>
        </a>
        <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
            <!-- item-->
            <div class="dropdown-header noti-title">
                <h6 class="text-overflow m-0">@lang('global.welcome') !</h6>
            </div>

            <!-- item-->
            <a href="{{ route('my-account')}}" class="dropdown-item notify-item">
                <i class="fe-user"></i>
                <span>@lang('global.my_account')</span>
            </a>

            <div class="dropdown-divider"></div>

            <!-- item-->
            <a href="javascript:void(0);" class="dropdown-item notify-item" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="fe-log-out"></i>
                <span>@lang('global.logout')</span>
            </a>

        </div>
    </li>

</ul>

<!-- LOGO -->
<div class="logo-box">
    <a href="/" class="logo text-center">
        <span class="logo-lg">
            <img src="{{ asset('assets/images/main-logo.png') }}" alt="" height="50">
        </span>
        <span class="logo-sm">
            <img src="{{ asset('assets/images/mobile-logo.png') }}" alt="" height="45">
        </span>
    </a>
</div>
<ul class="list-unstyled topnav-menu topnav-menu-left m-0">
    <li>
        <button class="button-menu-mobile waves-effect waves-light" id="btn_sidebar_expand">
            <i class="fe-menu"></i>
        </button>
    </li>
</ul>