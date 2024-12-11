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
                                <a href="/">
                                    <span><img src="{{ asset('assets/images/main-logo.png') }}" alt="" height="80"></span>
                                </a>
                            </div>
                            <form role="form" method="POST" action="{{ route('submit-login') }}" class="mt-2" id="login_form">
                                 @csrf
                                <div class="form-group mb-3">
                                    <label for="email">@lang("global.email")</label>
                                    <input class="form-control {{ $errors->has('email') ? 'has-error' : '' }}" autofocus type="email" id="email" name="email" value="{{ old('email') }}"  placeholder="@lang("global.login_email_placeholder")">
                                    @if($errors->has('email'))
                                        <div class="mt-1 require_error">
                                            {!! $errors->first('email') !!}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <label for="password">@lang("global.login_password")</label>
                                    <input class="form-control {{ $errors->has('password') ? 'has-error' : '' }} form-control-include" type="password" id="password" minlength="6" autocomplete name="password" placeholder="@lang("global.login_password_placeholder")">
                                    <i class="fe-eye-off vis-password" id="togglePassword"></i>
                                    @if($errors->has('password'))
                                        <div class="mt-1 require_error">
                                            {{ $errors->first('password') }}
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group mb-3">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="remember">
                                        <label class="custom-control-label" for="remember">@lang('global.remember_me') </label>
                                    </div>
                                </div>

                                <div class="form-group mb-0 text-center">
                                    <button class="btn bg-standard btn-block waves-effect waves-light" type="submit">@lang("global.login") </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- End card block -->
                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p> <a href="#" class="text-white-50 ml-1">@lang("global.forgot_password")</a></p>
                            <p class="text-white-50">@lang("global.dont_you_have_password") <a href="{{ route('register') }}" class="text-white ml-1"><b>@lang("global.sign_up")</b></a></p>
                        </div>
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
    <script>
        let rembemberStatus = false;
        const expireDate = 30;
        $(document).ready(function()
        {
            let rememberMe = $.cookie("remember_me");
            let login_email = $.cookie("login_email");
            let login_password = $.cookie('login_password');
            if(rememberMe == 'true')
            {
                rembemberStatus = true;
                $('#remember').click();
                $('#email').val(login_email);
                $('#password').val(login_password);
            }

            $('#remember').click(function(){
                if($(this).prop("checked") == true){
                    rembemberStatus = true;
                }
                else if($(this).prop("checked") == false){
                    rembemberStatus = false;
                }
            });
            $('#login_form').on('submit', function (evt) {
                setCookieValue();
            });
        });

        let setCookieValue = () => {
            $.cookie("remember_me", rembemberStatus, { expires : expireDate });
            if(rembemberStatus)
            {
                $.cookie("login_email", $('#email').val(), { expires : expireDate });
                $.cookie("login_password", $('#password').val(), { expires : expireDate });
            } else
            {
                $.cookie("login_email", '', { expires : expireDate });
                $.cookie("login_password", '', { expires : expireDate });
            }
        };
    </script>
</body>
</html>
