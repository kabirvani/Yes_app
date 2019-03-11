<div class="title">
    <p style="float: left;">Account Contact</p>
    <div>
        <label>All fields marked with <img style="margin-left:5px;margin-right:5px" src = "{{ asset('img/oval.svg') }}" /> are required</label>
    </div>
</div>
<div class="yellow_line"></div>
<div class="content">

    <div class="item" style="margin-bottom:3px">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="account_first_name_title">First Name</p>
        </div>
        <input type="text" class="form-control account_first_name" name="account_first_name" id="account_first_name" value="{{Auth::user()->contact_detail->account_first_name}}"/>
        <p class="warning_message account_first_name">Account First Name is required</p>
    </div>

    <div class="item" style="margin-bottom:3px">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="account_last_name_title">Last Name</p>
        </div>
        <input type="text" class="form-control account_last_name" name="account_last_name" id="account_last_name" value="{{Auth::user()->contact_detail->account_last_name}}"/>
        <p class="warning_message account_last_name">Account Last Name is required</p>
    </div>

    <div class="item" style="margin-bottom:3px;" id="account_phone_dialog">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="account_phone_title">Telephone Number</p>
        </div>
        <input class="form-control" type="tel" name="account_phone" id="account_phone" style="padding-right: 6px; padding-left: 52px;">
        <input class="form-control" type="text" hidden name="account_country_code" id="account_country_code">
        <p class="warning_message account_phone">Account Telephone Number is required.</p>
    </div>

    <div class="item" style="margin-bottom:3px">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="account_email_title">Email Address</p>
        </div>
        <input type="email" class="form-control account_email" name="account_email" id="account_email" value="{{Auth::user()->contact_detail->account_email}}"/>
        <p class="warning_message account_email">Account Email Address is required</p>
    </div>

</div>

<script>
    var account_phone = document.querySelector("#account_phone");
    window.intlTelInput(account_phone, {
        formatOnDisplay: "true",
        separateDialCode: "true",  
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            $.ajax({
                url: '/get_ip_location',
                method: 'GET',
                success: function(res){
                    var result = JSON.parse(res);
                    callback(result.country);
                }
            })
        }
    });
</script>