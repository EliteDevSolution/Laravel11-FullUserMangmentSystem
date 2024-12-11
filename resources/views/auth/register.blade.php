<!DOCTYPE html>
<html lang="en">
<head>
    @include('partials.head')
</head>
<body class="authentication-bg authentication-bg-pattern">
    <div class="account-pages mt-6 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5 col-lg-5">
                    <!-- Start card block -->
                    <div class="card bg-pattern">
                        <div class="card-body p-4">
                            <div class="text-center m-auto">
                                <a href="{{ url("/") }}">
                                    <span><img src="{{ asset('assets/images/main-logo.png') }}" alt="" height="80"></span>
                                </a>
                            </div>
                            <form role="form" method="POST" action="{{ route('submit-register') }}" class="mt-2" id="register_form">
                                 @csrf
                                <div class="form-group mb-3">
                                    <label for="name">@lang("global.user_name") <span class="text-danger">*</span></label>
                                    <input class="form-control {{ $errors->has('name') ? 'has-error' : '' }}" autofocus name="name" value="{{ old('name') }}"  placeholder="@lang("global.signup_name_placeholder")">
                                    @if($errors->has('name'))
                                        <div class="mt-1 require_error">
                                            {!! $errors->first('name') !!}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="email">@lang("global.email") <span class="text-danger">*</span></label>
                                    <input class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" autofocus type="email" name="email" value="{{ old('email') }}"  placeholder="@lang("global.login_email_placeholder")">
                                    @if($errors->has('email'))
                                        <div class="mt-1 require_error">
                                            {!! $errors->first('email') !!}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">@lang("global.login_password") <span class="text-danger">*</span></label>
                                    <input class="form-control {{ $errors->has('password') ? 'has-error' : '' }} form-control-include" type="password" id="password" minlength="6" autocomplete name="password" placeholder="@lang("global.login_password_placeholder")">
                                    @if($errors->has('password'))
                                        <div class="mt-1 require_error">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password_confirmation">@lang("global.confirm_password") <span class="text-danger">*</span></label>
                                    <input class="form-control form-control-include" type="password" id="password_confirmation" minlength="6" autocomplete name="password_confirmation" placeholder="@lang("global.confirm_password_placeholder")">
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn bg-standard btn-block waves-effect waves-light" type="submit">@lang("global.sign_up") </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End card block -->
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">@lang('global.already_have_account')  <a href="{{ route('login') }}" class="text-white ml-1"><b>@lang("global.sign_in")</b></a></p>
                        </div> <!-- end col -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- footer -->
    <footer class="footer footer-alt">
        @lang('global.login_footer_bar', ['cur_year' => date('Y')]) <a href="/" class="text-white">@lang('global.login_footer_item')</a>
    </footer>
    <!-- Js -->
    @include('partials.js')
</body>
</html>
