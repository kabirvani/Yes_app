<div class="title">
    <p>Physical Address</p>
</div>
<div class="yellow_line"></div>
<div class="content">
    <div class="item" style="margin-right:0px; width: 100%;margin-bottom:3px;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="physical_address_line1_title">Address Line1</p>
        </div>
        <div class="physical_address">
            <input type="text" style="width:calc(100% - 196px);" class="form-control physical_address_line1" name="physical_address_line1" id="physical_address_line1" placeholder = "Start typing you physical address" required value="{{Auth::user()->company_detail->physical_address_line1}}"/>
            <div class="manual">ADD ADDRESS MANUALY</div>
        </div>
        <p class="warning_message physical_address_line1">Physical Address is required</p>
    </div>
    <div class="manual_address">
        <div class="item" style="width: 60%; margin-right: 5%;">
            <div class="oval">
                <img />
                <p class="physical_address_line2_title">Address Line2</p>
            </div>
            <input type="text" class="form-control physical_address_line2" name="physical_address_line2" id="physical_address_line2" value="{{Auth::user()->company_detail->physical_address_line2}}"/>
        </div>

        <div class="item" style="width: 35%; margin-right: 0px;">
            <div class="oval">
                <img src = "{{ asset('img/oval.svg') }}" />
                <p class="physical_city_title">City</p>
            </div>
            <input type="text" class="form-control physical_city" name="physical_city" id="physical_city" value="{{Auth::user()->company_detail->physical_city}}"/>
        </div>

        <div class="item" style="width: 20%; margin-right: 5%;">
            <div class="oval">
                <img src = "{{ asset('img/oval.svg') }}" />
                <p class="physical_state_title">State / Province</p>
            </div>
            <input type="text" class="form-control physical_state" name="physical_state" id="physical_state" value="{{Auth::user()->company_detail->physical_state}}"/>
        </div>

        <div class="item" style="width: 20%; margin-right: 5%;">
            <div class="oval">
                <img src = "{{ asset('img/oval.svg') }}" />
                <p class="physical_zip_code_title">Postal Code / Zip Code</p>
            </div>
            <input type="text" class="form-control physical_zip_code" name="physical_zip_code" id="physical_zip_code" value="{{Auth::user()->company_detail->physical_zip_code}}"/>
        </div>

        <div class="item" style="width: 50%; margin-right: 0px;">
            <div class="oval">
                <img src = "{{ asset('img/oval.svg') }}" />
                <p class="physical_country_title">Country</p>
            </div>
            <select class="form-control physical_country" name="physical_country" placeholder="Select your country" id="physical_country">
                @include('company_details_layouts.country_list')
            </select>
        </div>
    </div>
</div>
<script>
    var country = "not working";
    $("#physical_country").select2({
        placeholder: $("#physical_country").attr('placeholder')
    });

    $('#physical_country').on('select2:select', function (e) {
        var id = e.target.id;
        $("."+id+"_title").css('color',"#000000");
    });
    $('#physical_country').on('select2:unselect', function (e) {
        var id = e.target.id;
        $("."+id+"_title").css('color',"#ff0000");
    });
    var physical_country_name = "{{ Auth::user()->company_detail->physical_country}}";
    $('#physical_country').val(physical_country_name);
    $('#physical_country').select2().trigger('change');
    $(".physical_country_title").css('color', 'black');
    function activatePlacesSearch(){
        var input = document.getElementById('physical_address_line1');
        var autocomplete = new google.maps.places.Autocomplete(input);
        google.maps.event.addListener(autocomplete, 'place_changed', function(){
            var place = autocomplete.getPlace();
            place = place["address_components"];
            console.log(place);
            $(".company_details_dialog.physical_address_dialog").css("height", "410px");
            $(".company_details_dialog .manual_address").show();
            $(".company_details_dialog.physical_address_dialog .physical_address_line1").css("width", "100%");
            $(".company_details_dialog.physical_address_dialog .manual").hide();
            var street_num = '';
            for(var i = 0; i < place.length; i++)
            {   
                switch(place[i].types[0]){
                    case "postal_code":
                        $(".form-control.physical_zip_code").val(place[i].long_name);
                        $(".physical_zip_code_title").css('color', 'black');
                        break;
                    case "country":
                        $('#physical_country').val(place[i].short_name);
                        $('#physical_country').select2().trigger('change');                  
                        $(".physical_country_title").css('color', 'black');
                        break;
                    case "administrative_area_level_1":
                        $(".form-control.physical_state").val(place[i].short_name);
                        $(".physical_state_title").css('color', 'black');
                        break;
                    case "neighborhood":
                        $(".form-control.physical_address_line2").val(place[i].long_name);
                        $(".physical_address_line2_title").css('color', 'black');
                        break;
                    case "locality":
                        $(".form-control.physical_city").val(place[i].long_name);
                        $(".physical_city_title").css('color', 'black');
                        break;
                    case "route":
                        $(".form-control.physical_address_line1").val(street_num + " " + place[i].long_name);
                        $(".physical_address_line1_title").css('color', 'black');
                        break;
                    case "street_number":
                        street_num = place[i].long_name;
                        $(".physical_address_line1_title").css('color', 'black');
                        break;
                    default:
                        break;
                }
                    
                
            }
        })
    }
    
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD4tBJjcMugDvmtKuB21n7wCI0YKaoCMAQ&libraries=places&callback=activatePlacesSearch"></script>
