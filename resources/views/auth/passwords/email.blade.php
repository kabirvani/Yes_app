<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link href="/css/application.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&amp;subset=cyrillic,cyrillic-ext,greek,greek-ext,latin-ext,vietnamese" rel="stylesheet">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta charset="utf-8">
</head>
<body>
    <div class="single-widget-container mb-lg" style="background:#f4f6f9;">
        <section class="widget">
            <div class="body">
                @include('layouts.logo')
                <div id="login_dialog">
                    <img src="https://a.icons8.com/KXlZoYqk/I0fVeI/adobestock_202605505.svg" />
                    <div class="login_dialog" style="height: auto; padding-bottom: 44px;">
                        <div class="">
                            @if (session('status'))
                                <p class="login_dialog_title">Password Reset</p>
                            @else
                                <p class="login_dialog_title">Check Your Email</p>
                            @endif
                            <div style="width: 460px;height: 1px;background:#e3e7eb;margin-bottom:17px;margin-left:-30px;"></div>
                            <div style="width: 72px;height: 1px;background:#f7a823;margin-top:-18px;margin-bottom:30px;"></div>
                            <div class="card">
                                <div class="card-body">
                                    @if (session('status'))
                                        <p style="font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color: #424e58;">We’ve just sent a reset link to 
                                        <b id="reset_success_email">{{ old('email') }}.</b> It will expire shortly so check soon.</p>
                                    @else
                                        <p style="width: 400px;height: 32px;font-family: Roboto;font-size: 14px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color: #000000;margin-bottom: 20px;">To reset your password, enter the email address you use to sign in to <b>portal.dev.yes4youth.co.za</b></p>
                                        <form method="POST" action="{{ route('password.email') }}" aria-label="{{ __('Reset Password') }}">
                                            @csrf
                                            <div class="form-group">
                                                <div class="">
                                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required  placeholder="Email Address">
                                                    @if ($errors->has('email'))
                                                        <span class="invalid-feedback" style="margin-top: 8px; font-family: Roboto;font-size: 12px;font-weight: normal;font-style: normal;font-stretch: normal;line-height: normal;letter-spacing: normal;color: #ff3b30;" role="alert">
                                                            {{ $errors->first('email') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group mb-0">
                                                <div class="">
                                                    <button type="submit" class="btn btn-primary">
                                                        GET RESET LINK
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif
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
<script src="/js/app.js"></script>
<script src="/js/settings.js"></script>

<!-- page specific scripts -->
    <!-- page specific libs -->
<script src="{{ asset('lib/parsleyjs/dist/parsley.min.js') }}"></script>
</body>
</html>
