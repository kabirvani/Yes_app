<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
        <link href="css/application.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
    <script>
        
    </script>
</head>
<body>
    <div class="single-widget-container mb-lg" style="background:#f4f6f9;">
        <section class="widget">
            <div class="body">
                @include('layouts.logo')
                <div id="login_dialog">
                    <img src="https://a.icons8.com/KXlZoYqk/I0fVeI/adobestock_202605505.svg" />
                    <div class="login_dialog">
                        <div class="justify-content-center" style="position:relative;">
                            <p class="login_dialog_title">Sign In To The Company Portal</p>
                            <div style="width: 460px;height: 1px;background:#e3e7eb;margin-bottom:17px;margin-left:-30px;"></div>
                            <div style="width: 72px;height: 1px;background:#f7a823;margin-top:-18px;margin-bottom:17px;"></div>
                            <div class="">
                                <div class="card">
                                    <div class="card-body">
                                        @if ($errors->has('email'))
                                            <div class="login_error">
                                                <img src="https://a.icons8.com/KXlZoYqk/uESQ99/icons8-cancel.svg"/>
                                                <p>Incorrect email address or password. Please try again.</p>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ route('login') }}" aria-label="{{ __('Login') }}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="">
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Email Address">
                                                    
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="">
                                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required  placeholder="Password">
                                                    <!-- @if ($errors->has('password'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('password') }}</strong>
                                                        </span>
                                                    @endif -->
                                                </div>
                                            </div>

                                            <div class="form-group mb-0">
                                                <div class="">
                                                    <button type="submit" class="btn btn-primary">
                                                        SIGN IN
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="form-group" style="margin-top:31px;">
                                                <div class="">
                                                    <div class="form-check" style="float:left;display:flex;">
                                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} style="align-self:center;margin:0;">

                                                        <label class="form-check-label" for="remember" style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color: #000000;align-self:center;margin:0;">
                                                        Remember me
                                                        </label>
                                                        
                                                    </div>
                                                    <a class="btn btn-link forgot_password" href="{{ route('password.request') }}" style="float:right">
                                                        {{ __('Forgot Your Password?') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include ('layouts/login_side')
        </section>
        
        
    </div>
<!-- common libraries. required for every page-->
<script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('lib/jquery-pjax/jquery.pjax.js') }}"></script>
<script src="{{ asset('lib/bootstrap-sass/assets/javascripts/bootstrap.min.js') }}"></script>
<script src="{{ asset('lib/widgster/widgster.js') }}"></script>
<script src="{{ asset('lib/underscore/underscore.js') }}"></script>
<script src="{{ asset('lib/select2/select2.min.js') }}"></script>
<script src="{{ asset('lib/moment/moment.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('lib/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') }}"></script>

<!-- common application js -->
<script src="js/app.js"></script>
<script src="js/settings.js"></script>

<!-- page specific scripts -->
    <!-- page specific libs -->
<script src="{{ asset('lib/parsleyjs/dist/parsley.min.js') }}"></script>
    
</body>
</html>