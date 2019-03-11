<form action = "{{ url('sendVerifyCode') }}" method="post">
    {{ csrf_field() }}
    
    <div class="create_new_company_profile">
        <fieldset>
            <h2 style="color:#F7A823;font-size:28px; font-weight:bold;margin-bottom:0px;height:50px;" class="create_company_title">Create a new company profile</h2>
            <div class="form-group" style="margin-bottom: 20px;">
                <label for="email" style="font-size:14px;height: 35px;font-weight:normal;" >Your <b>email address</b></label>
                <input id="email" name="email" type="email" style="width:400px;height:46px;border-radius: 2px;" class="form-control input-lg input-transparent {{ $errors->has('email') ? ' parsley-error' : '' }}" value="{{ old('email') }}" required>
            </div>
            @isset ($user['duplicate'])
                @if($user['duplicate'] == 1)
                    <label style="margin-bottom:20px; font-size:14px;font-weight: normal;color:red;">
                        * This email has already taken. We have sent the email to your address. Please check your email.
                    </label>
                @endif
            @endif
            <div class="form-group"  style="margin-bottom: 20px;">
                <label style="font-size:14px;font-weight: normal;">
                    By creating a company profile, you agree to our <a target="_blank" href=""><b>customer terms of service</b></a> and <a target="_blank" href=""><b>privacy policy</b></a>.
                </label>
            </div>
        </fieldset>

        <div style="padding:0; margin:0;">
            <button type="submit" style="padding:0;border-radius:2px;border:none;background-color: #F7A823;height:46px;width:110px" class="btn btn-block btn-lg btn-info sendVerifyCode" disabled>
                <small  style="font-size: 12px;font-weight: 500;">NEXT</small>
                <img style="width:8px;height:13px;margin-left: 24px;" src="{{ asset('img/expand2.png') }}">
            </button>
        </div>
    </div>
</form>
<script src="{{ asset('lib/jquery/dist/jquery.min.js') }}"></script>
<script>
    function validateEmail(sEmail) {
        var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;
        if (filter.test(sEmail)) {
            return true;
        }
        else {
            return false;
        }
    }
    $(document).ready(function(){
        $("#email").keyup(function(e){
            var sEmail = $('#email').val();            
            if (validateEmail(sEmail)) {
                $(".create_new_company_profile button").removeAttr("disabled");
            }
            else {
                $(".create_new_company_profile button").attr("disabled","disabled");
            }
        })
    })
</script>