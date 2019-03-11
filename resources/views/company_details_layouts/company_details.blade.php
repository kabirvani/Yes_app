<div class="title">
    <p>Company Details</p>
</div>
<div class="yellow_line"></div>
<div class="content">
    <div class="item">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p style="color: #000000;">Company Name:</p>
        </div>
        <input type="text" value="{{Auth::user()->name}}" class="disabled"/>
        <input type="text" hidden name="name" id="name" class="form-control" value="{{Auth::user()->name}}" required/>
        <input type="text" hidden name="id" id="id" class="form-control" value="{{Auth::user()->id}}" required/>
    </div>

    <div class="item" style="margin-bottom: 3px;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="reg_num_title">Company Registration Number</p>
        </div>
        <input type="text" name="reg_num" maxlength="15" class="form-control" id="reg_num" placeholder=" __ / ________ / __" value="{{Auth::user()->company_detail->reg_num}}" required/>
        <p class="warning_message reg_num">Company Registration Number is required</p>
    </div>

    <div class="item company_type" style="margin-bottom:3px;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="company_type_title">Company Type</p>
        </div>
        <select class="form-control js-select2" name="company_type" id="company_type" placeholder="Select a company type" required>
            <option></option>
            <option>Private</option>
            <option>Public Company</option>
            <option>State Owned Company</option>
            <option>Non Profit Organisation</option>
            <option>Other</option>
        </select>
        <p class="warning_message company_type">Company Type is required</p>
        
    </div>

    <div class="item industry" style="margin-bottom:3px;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="industry_title">Industry</p>
        </div>
        <select class="form-control js-select2" name="industry" id="industry" placeholder="Select an industry" required>
            <option></option>
            <option>Agriculture, forestry and fishing</option>
            <option>Mining and quarrying</option>
            <option>Manufacturing</option>
            <option>Electricity, gas, steam and air conditioning supply</option>
            <option>Water supply, sewerage, waste management and remediation activities</option>
            <option>Construction</option>
            <option>Wholesale and retail trade, repair of motor vehicles and motocycles</option>
            <option>Transportation and storage</option>
            <option>Accommodation and food service activities</option>
            <option>Information and communication</option>
            <option>Financial and insurance activities</option>
            <option>Real estate activities</option>
            <option>Professional, scientific and technical activities</option>
            <option>public administration and defence, compulsory social security</option>
            <option>Education</option>
            <option>Human, health and social work activities</option>
            <option>Arts, entertainment and recreation</option>
            <option>Other service activities</option>
        </select>
        <p class="warning_message industry">Industry is required</p>
    </div>

    <div class="item" style="margin-bottom:3px;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="phone_title">Telephone Number</p>
        </div>
        <input class="form-control" type="tel" name="tel_num" id="phone" style="padding-right: 6px; padding-left: 96px;padding-top:13px;" required>
        <input class="form-control" type="text" hidden name="country_code" id="country_code" value="1" required>
        <p class="warning_message phone">Telephone Number is required.</p>
    </div>

    <div class="item" style="margin-bottom:3px;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="website_address_title">Website address</p>
        </div>
        <input type="text" name="website_address" class="form-control" id="website_address" value="{{Auth::user()->company_detail->website_address}}" required/>
        <p class="warning_message website_address">Website address is required.</p>
    </div>

    <div class="item financial_year" style="margin-bottom:3px;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="financial_year_title">Financial Year End</p>
        </div>
        <select class="form-control js-select2" name="financial_year_end" id="financial_year" placeholder="Select a month" required>
            <option></option>
            <option>January</option>
            <option>Feburary</option>
            <option>March</option>
            <option>April</option>
            <option>May</option>
            <option>Jun</option>
            <option>July</option>
            <option>August</option>
            <option>September</option>
            <option>October</option>
            <option>November</option>
            <option>December</option>
        </select>
        <p class="warning_message financial_year">Financial Year End is required</p>
    </div>

    <div class="item" style="margin-bottom:3px;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="vat_num_title">VAT Registration Number</p>
        </div>
        <input class="form-control" name="vat_num" maxlength="10" id="vat_num" type="text" value="{{Auth::user()->company_detail->vat_num}}" required/>
        <p class="warning_message vat_num">VAT Registration Number is required</p>
    </div>

    <div class="item beee_level" style="margin-bottom:3px;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="beee_level_title">Current B-BEEE Level</p>
        </div>
        
        <select class="form-control js-select2" name="beee_level" id="beee_level" value = "Level 1" placeholder="Select a level" required>
            <option></option>
            <option>Level 1</option>
            <option>Level 2</option>
            <option>Level 3</option>
            <option>Level 4</option>
            <option>Level 5</option>
            <option>Level 6</option>
            <option>Level 7</option>
            <option>Level 8</option>
            <option>Level Not Sure/Rather Not Say</option>            
        </select>
        <p class="warning_message beee_level">B-BEEE Level is required</p>
    </div>

    <div class="item">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="beee_certificate_title">Upload B-BEEE Certificate</p>
        </div>
        <input class="form-control" id="beee_certificate_location" name="beee_certificate" type="text" hidden required/>
        <div id="beee_certificate" class="dropzone">
            <div class="dz-default dz-message"></div>
        </div>
        <input type="text" hidden id="beee_id" value="{{Auth::user()->id}}" name="id"/>
    </div>
</div>

<script>
    $(".js-select2").each(function() {
            $(this).select2({
            placeholder: $(this).attr('placeholder')
        });
    });
    $('select').on('select2:select', function (e) {
        var id = e.target.id;
        $("."+id+"_title").css('color',"#000000");
        $(".warning_message."+id).css('opacity',0);
    });
    $('select').on('select2:unselect', function (e) {
        var id = e.target.id;
        $("."+id+"_title").css('color',"#ff0000");
        $(".warning_message."+id).css('opacity',1);
    });
    
    var input = document.querySelector("#phone");
    
    window.intlTelInput(input, {
        formatOnDisplay: "true",
        separateDialCode: "true",  
        initialCountry: "auto",
        geoIpLookup: function(callback) {
            $.ajax({
                url: '/get_ip_location',
                method: 'GET',
                success: function(res){
                    var result = JSON.parse(res);
                    console.log(result);
                    callback(result.country);
                }
            })
        }
    });
</script> 