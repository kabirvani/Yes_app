<form action = "{{ url('companyName') }}" method="post">
{{ csrf_field() }}
<div class="check_email_code">
    <fieldset>
        <h2 style="color:#F7A823;font-size:28px; font-weight:bold;margin-bottom:0px;height:50px;" class="create_company_title">Check your email!</h2>
        <div class="form-group" style="margin-bottom: 20px;">
            <label style="font-size:14px;height: 35px;font-weight:normal;" >We’ve just sent a 6-digit code to <b>{{ $user['email'] }}</b>. It will expire shortly so enter it  soon</label>
            <div class="input_verify_code">
                @isset($user['email'])
                    <input type="hidden" name="email" value="{{ $user['email'] }}"/>
                @endisset
                @isset($user['six_digit_random_number'])
                    <input type="hidden" name="six_digit_random_number" value="{{ $user['six_digit_random_number'] }}"/>
                    <input type="hidden" name="verifyCode" value="{{ $user['verifyCode'] }}" />
                @endisset
                <input id="first_digit" class="form-control input-lg input-transparent" name="first_digit" required maxlength="1"/>
                <input class="form-control input-lg input-transparent" name="second_digit" required maxlength="1"/>
                <input class="form-control input-lg input-transparent" name="third_digit" required maxlength="1"/>
                <div></div>
                <input class="form-control input-lg input-transparent" name="fouth_digit" required maxlength="1"/>
                <input class="form-control input-lg input-transparent" name="fifth_digit" required maxlength="1"/>
                <input class="form-control input-lg input-transparent" name="sixth_digit" required maxlength="1"/>
            </div>

            @if($user['verifyCode'] == 0)
                <p style="font-family: Roboto;font-size: 14px;font-weight: normal;color: red;">Incorrect pin, Please try again.</p>
            @endif

            <div style="clear:both;"></div>
            <a style="font-family: Roboto;font-size: 14px;font-weight: normal;color: #9aa8af;">Leave this window open while you check. Don’t forget to also check your spam folder.</a>
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
    function pasteCode(pastedData){
        pastedData = pastedData.slice(0,7);
        var count = [], no = 0, i;
        for (i = 0; i < 7; i++)
        {
            if(pastedData[i] >= '0' && pastedData[i] <= '9')
                count[no++] = pastedData[i];
        }

        if(no == 6)
        {
            for (i = 0; i < 6; i++)
                $(".input_verify_code .input-transparent:eq(" + i + ")").val(count[i]);
            $(".input_verify_code .input-transparent:eq(" + 5 + ")").focus();
            $('.check_email_code button').removeAttr("disabled");
        }
    }
    $(document).ready(function(){
        
        $(window).bind('keydown', function (e) {
            // Cmd-V
            if (e.which == 86 && e.metaKey) {
                if (e.target.nodeName.toUpperCase() !== "INPUT")
                    $('#first_digit').focus();
            }
        });

        $(window).bind('beforepaste', function (e) {
            return false;
        });

        $(window).bind('paste', function (e) {
            var clipboardData = e.originalEvent.clipboardData;
            var pastedData = clipboardData.getData('text/plain');
            pasteCode(pastedData);
        });
        $("#first_digit").bind("paste", function(e){
            var pastedData = e.originalEvent.clipboardData.getData('text');
            pasteCode(pastedData);
        } );
        $(".input_verify_code .input-transparent").keypress(function(){
            var index = $(".input_verify_code .input-transparent").index(this);
            index++;
            $(".input_verify_code .input-transparent:eq(" + index + ")").focus();
        })
        
        $(".input_verify_code .input-transparent").keyup(function(){
            var disabled = false;
            for(var i = 0; i < 6; i++)
            {
                var val = $(".input_verify_code .input-transparent:eq(" + i + ")").val();
                if(val.length == 0)
                    disabled = true;
            }
            if(!disabled)
                $('.check_email_code button').removeAttr("disabled");
            else
                $('.check_email_code button').attr("disabled","disabled");
        });
    });
</script>