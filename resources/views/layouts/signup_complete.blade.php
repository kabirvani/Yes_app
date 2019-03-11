<!-- <form action = "{{ url('sendWelcomeMail') }}" method="post"> -->
<div>
    <div class="signup_complete">
        <fieldset>
            <h2 style="color:#F7A823;font-size:28px; font-weight:bold;margin-bottom:22px;" class="create_company_title">Congratulations, you’re all setup and ready to go!</h2>
            <div class="form-group" style="margin-bottom: 20px;">
                @isset($user['email'])
                    <input type="hidden" name="email" value="{{ $user['email'] }}"/>
                @endisset
                <label for="email" style="font-size:14px;height: 35px;font-weight:normal;" >Take note of your login details below. We’ve also sent you an email with these details:</label>
            </div>
            <table style="margin-bottom: 19px;">
                <tbody>
                    <tr>
                        <td style="font-family: Roboto;font-size: 14px;font-weight: normal;color:#9aa8af;padding-right:30px;">Portal URL:</td>
                        <td>
                            <a href="https://portal.dev.yes4youth.co.za" style="font-family: Roboto;font-size: 14px;font-weight: normal;color: #000000;">
                                portal.dev.yes4youth.co.za
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td style="font-family: Roboto;font-size: 14px;font-weight: normal;color:#9aa8af;padding-right:30px;">Email:</td>
                        <td style="font-family: Roboto;font-size: 14px;font-weight: normal;">
                            @isset($user['email'])
                                <a href="mailto:{{$user['email'] }}"  style="font-family: Roboto;font-size: 14px;font-weight: normal;color: #000000;">
                                    {{$user['email'] }}
                                </a>
                            @endisset
                        </td>
                    </tr>
                </tbody>
            </table>
        </fieldset>

        <div class="form-actions" style="padding:0; margin:0;">
            <button id="finish_signup" style="padding:0;border-radius:2px;border:none;background-color: #F7A823;height:46px;width:110px" class="btn btn-block btn-lg btn-info">
                <small  style="font-size: 12px;font-weight: 500;">NEXT</small>
                <img style="width:8px;height:13px;margin-left: 24px;" src="{{ asset('img/expand2.png') }}">
            </button>
        </div>
    </div>
</div>