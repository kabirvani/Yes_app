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
    <div class="single-widget-container mb-lg">
        <section class="widget login-widget" style="background:white;">
            <div class="body">
                @include('layouts.logo')
                <div>
                    @if(!isset($user['email']))
                        @include('layouts.create_new_company_profile')
                    @elseif(isset($user['verifyCode']))
                        @if($user['verifyCode'] != 1)
                            @include('layouts.check_email_code')
                        @else
                            @if(!isset($user['name']))
                                @include('layouts.company_name')
                            @elseif(!isset($user['password']))
                                @include('layouts.create_password')
                            @else
                                @include('layouts.signup_complete')
                            @endif
                        @endif
                    @endif
                </div>
            </div>
        </section>

        <form id="register_form" action = "{{ route('register') }}" method="post" style="display:none">
            {{ csrf_field() }}

            @isset($user['email'])
            <input type="hidden" name="email" value="{{ $user['email'] }}"/>
            <input type="hidden" name="portal_url" value="portal.dev.yes4youth.co.za" />
            @endisset

            @isset($user['name'])
            <input type="hidden" name="name" value="{{ $user['name'] }}"/>
            @endisset

            @isset($user['password'])
            <input type="hidden" name="password" value="{{ $user['password'] }}"/>
            @endisset

            @isset($user['password_confirmation'])
            <input type="hidden" name="password_confirmation" value="{{ $user['password_confirmation'] }}"/>
            @endisset

            <button type="submit">Register</button>

        </form>
        
        @include ('layouts/signup_side')
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