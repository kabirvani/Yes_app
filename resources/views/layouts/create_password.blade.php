<form action = "{{ url('welcomeSignup') }}" method="post">
{{ csrf_field() }}
<div class="create_password">
    <fieldset>
        <h2 style="color:#F7A823;font-size:28px; font-weight:bold;margin-bottom:0px;height:50px;" class="create_company_title">Finally, create a password?</h2>
        <div class="form-group" style="margin-bottom: 20px;">
            @isset($user['email'])
                <input type="hidden" name="email" value="{{ $user['email'] }}"/>
            @endisset
            @isset($user['verifyCode'])
                <input type="hidden" name="verifyCode" value="{{ $user['verifyCode'] }}"/>
            @endisset
            @isset($user['name'])
                <input type="hidden" name="name" value="{{ $user['name'] }}"/>
            @endisset
            <input name="password" id="password" type="password" style="width:400px;height:46px;border-radius: 2px;" class="form-control input-lg input-transparent {{ $errors->has('password') ? ' parsley-error' : '' }}" value="{{ old('password') }}" required placeholder="Choose a password">
            <input name="password_confirmation" id="password_confirmation" type="password" style="margin-top:20px;width:400px;height:46px;border-radius: 2px;" class="form-control input-lg input-transparent {{ $errors->has('password_confirmation') ? ' parsley-error' : '' }}" value="{{ old('password_confirmation') }}" required placeholder="Retype password">
        </div>
    </fieldset>

    <div class="form-actions" style="padding:0; margin:0;">
        <button type="submit" style="padding:0;border-radius:2px;border:none;background-color: #F7A823;height:46px;width:110px" class="btn btn-block btn-lg btn-info" disabled>
            <small  style="font-size: 12px;font-weight: 500;">NEXT</small>
            <img style="width:8px;height:13px;margin-left: 24px;" src="{{ asset('img/expand2.png') }}">
        </button>
    </div>
</div>
</form>
<script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
<script>
    $(document).ready(function(){
        $(".create_password .input-transparent").keyup(function(e){
            var password = $('#password').val();
            var password_confirmation = $('#password_confirmation').val();
            if (password.length > 0 && password === password_confirmation) {
                $(".create_password button").removeAttr("disabled");
            }
            else {
                $(".create_password button").attr("disabled","disabled");
            }
        })
    })
</script>