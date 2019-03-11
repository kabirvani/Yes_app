<form action = "{{ url('createPassword') }}" method="post">
{{ csrf_field() }}
<div class="company_name">
    <fieldset>
    <h2 style="color:#F7A823;font-size:28px; font-weight:bold;margin-bottom:0px;height:50px;" class="create_company_title">What is your company name?</h2>
    <div class="form-group" style="margin-bottom: 20px;">
        @isset($user['email'])
            <input type="hidden" name="email" value="{{ $user['email'] }}"/>
        @endisset
        @isset($user['verifyCode'])
            <input type="hidden" name="verifyCode" value="{{ $user['verifyCode'] }}"/>
        @endisset
        <input name="name" id="name" type="text" style="width:400px;height:46px;border-radius: 2px;" class="form-control input-lg input-transparent {{ $errors->has('name') ? ' parsley-error' : '' }}" value="{{ old('name') }}" required placeholder="Ex: Acme, Inc or Acme Corp">
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
        $("#name").keyup(function(e){
            var sEmail = $('#name').val();
            if (sEmail.length > 0) {
                $(".company_name button").removeAttr("disabled");
            }
            else {
                $(".company_name button").attr("disabled","disabled");
            }
        })
    })
</script>