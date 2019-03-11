<div class="title">
    <p style="float: left;">Primary Contact</p>
    <div>
        <label>All fields marked with <img style="margin-left:5px;margin-right:5px" src = "{{ asset('img/oval.svg') }}" /> are required</label>
    </div>
</div>
<div class="yellow_line"></div>
<div class="content">

    <div class="item" style="margin-bottom:3px">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="primary_first_name_title">First Name</p>
        </div>
        <input type="text" class="form-control primary_first_name" name="primary_first_name" id="primary_first_name" value="{{Auth::user()->contact_detail->primary_first_name}}"/>
        <p class="warning_message primary_first_name">Primary First Name is required</p>
    </div>

    <div class="item" style="margin-bottom:3px">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="primary_last_name_title">Last Name</p>
        </div>
        <input type="text" class="form-control primary_last_name" name="primary_last_name" id="primary_last_name" value="{{Auth::user()->contact_detail->primary_last_name}}"/>
        <p class="warning_message primary_last_name">Primary Last Name is required</p>
    </div>

    <div class="item" style="margin-bottom:3px;" id="primary_phone_dialog">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="primary_phone_title">Telephone Number</p>
        </div>
        <input class="form-control" type="tel" name="primary_phone" id="primary_phone" style="padding-right: 6px; padding-left: 52px;">
        <input class="form-control" type="text" hidden name="primary_country_code" id="primary_country_code">
        <p class="warning_message primary_phone">Primary Telephone Number is required.</p>
    </div>

    <div class="item" style="margin-bottom:3px">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="email_title" style="color: #000000;">Email Address</p>
        </div>
        <input type="text" class="form-control email disabled" name="" value="{{Auth::user()->email}}"/>
        <p class="warning_message email">Primary First Name is required</p>
    </div>

</div>

<script>
    var primary_phone = document.querySelector("#primary_phone");
    window.intlTelInput(primary_phone, {
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
            });
            
        }
    });
    
</script>