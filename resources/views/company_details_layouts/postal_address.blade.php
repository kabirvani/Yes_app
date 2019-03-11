<div class="title">
    <p style="float: left;">Postal Address</p>
    <div>
        <label class="container" for="same_as_physical_address">Same As Physical Address
            <input name="same_as_physical_address" id="same_as_physical_address" class="same_as_physical_address" type="checkbox" style="align-self:center;margin:0;">
            <span class="checkmark"></span>
        </label>
    </div>
</div>
<div class="yellow_line"></div>
<div class="content">
    <div class="item" style="margin-right:0px; width: 100%;margin-bottom:3px">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="postal_address_line1_title">Address Line1</p>
        </div>
        <input type="text" class="form-control postal_address_line1" name="postal_address_line1" id="postal_address_line1" required value="{{Auth::user()->company_detail->postal_address_line1}}"/>
        <p class="warning_message postal_address_line1">Postal Address is required</p>
    </div>

    <div class="item" style="width: 60%; margin-right: 5%;">
        <div class="oval">
            <img />
            <p class="postal_address_line2_title">Address Line2</p>
        </div>
        <input type="text" class="form-control postal_address_line2" name="postal_address_line2" id="postal_address_line2" value="{{Auth::user()->company_detail->postal_address_line2}}"/>
    </div>

    <div class="item" style="width: 35%; margin-right: 0px;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="postal_city_title">City</p>
        </div>
        <input type="text" class="form-control postal_city" name="postal_city" id="postal_city" value="{{Auth::user()->company_detail->postal_city}}"/>
    </div>

    <div class="item" style="width: 20%; margin-right: 5%;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="postal_state_title">State / Province</p>
        </div>
        <input type="text" class="form-control postal_state" name="postal_state" id="postal_state" value="{{Auth::user()->company_detail->postal_state}}"/>
    </div>

    <div class="item" style="width: 20%; margin-right: 5%;">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="postal_zip_code_title">Postal Code / Zip Code</p>
        </div>
        <input type="text" class="form-control postal_zip_code" name="postal_zip_code" id="postal_zip_code" value="{{Auth::user()->company_detail->postal_zip_code}}"/>
    </div>

    <div class="item" style="width: 50%; margin-right: 0px;" id="postal_country" include="form-input-select()">
        <div class="oval">
            <img src = "{{ asset('img/oval.svg') }}" />
            <p class="postal_country_name_title">Country</p>
        </div>
        <select class="form-control postal_country" name="postal_country" id="postal_country_name" placeholder="Select your country">
            @include('company_details_layouts.country_list')
        </select>
    </div>
</div>
<style>
/* The container */
.container {
  display: block;
  position: relative;
  padding-left: 29px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: -3px;
  left: 0;
  height: 18px;
  width: 18px;
  border: 2px solid #d8d8d8;
  border-radius: 2px;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
    /* background-color: #d8d8d8;
    border: 2px solid #d8d8d8; */
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #f7a823;
  border: 2px solid #f7a823;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
    left: 3.5px;
    top: 0px;
    width: 7px;
    height: 11px;
    border: solid white;
    border-width: 0 2px 2px 0;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
}
</style>
<script>
    $("#postal_country_name").select2({
        placeholder: $("#postal_country_name").attr('placeholder')
    });

    $('#postal_country_name').on('select2:select', function (e) {
        var id = e.target.id;
        warningMessageActivate(e.target, "#000000", "0")
        // $("."+id+"_title").css('color',"#000000");
    });
    $('#postal_country_name').on('select2:unselect', function (e) {
        var id = e.target.id;
        $("."+id+"_title").css('color',"#ff0000");
    });
    
    var input = document.getElementById('postal_address_line1');
    var autocomplete = new google.maps.places.Autocomplete(input);

    var postal_country_name = "{{ Auth::user()->company_detail->postal_country}}";
    $('#postal_country_name').val(postal_country_name);
    $('#postal_country_name').select2().trigger('change');
    $(".postal_country_name_title").css('color', 'black');

    google.maps.event.addListener(autocomplete, 'place_changed', function(){
        var place = autocomplete.getPlace();
        place = place["address_components"];
        var street_num = '';
        var country = '';
        for(var i = 0; i < place.length; i++)
        {
            switch(place[i].types[0]){
                case "postal_code":
                    $(".form-control.postal_zip_code").val(place[i].long_name);
                    $(".postal_zip_code_title").css('color', 'black');
                    break;
                case "country":
                    $('#postal_country_name').val(place[i].short_name);
                    $('#postal_country_name').select2().trigger('change');
                    $(".postal_country_title").css('color', 'black');
                    break;
                case "administrative_area_level_1":
                    $(".form-control.postal_state").val(place[i].long_name);
                    $(".postal_state_title").css('color', 'black');
                    break;
                case "locality":
                    $(".form-control.postal_city").val(place[i].long_name);
                    $(".postal_city_title").css('color', 'black');
                    break;
                case "neighborhood":
                    $(".form-control.postal_address_line2").val(place[i].long_name);
                    $(".postal_address_line2_title").css('color', 'black');
                    break;
                case "street_number":
                    street_num = place[i].long_name;
                    $(".postal_address_line1_title").css('color', 'black');
                    break;
                case "route":
                    $(".form-control.postal_address_line1").val(street_num + " " + place[i].long_name);
                    $(".postal_address_line1_title").css('color', 'black');
                    break;
                default:
                
            }
        }
    })
</script>