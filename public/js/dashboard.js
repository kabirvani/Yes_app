function warningMessageActivate(e, color, opacity){
    var id = $(e).attr("id");
    $("."+id+"_title").css('color',color);
    $(".warning_message."+id).css('opacity',opacity);
}
function validateURL(textval) {
    var urlregex = /^(https?|ftp):\/\/([a-zA-Z0-9.-]+(:[a-zA-Z0-9.&%$-]+)*@)*((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9][0-9]?)(\.(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[1-9]?[0-9])){3}|([a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]+\.(com|edu|gov|int|mil|net|org|biz|arpa|info|name|pro|aero|coop|museum|[a-zA-Z]{2}))(:[0-9]+)*(\/($|[a-zA-Z0-9.,?'\\+&%$#=~_-]+))*$/;
    return urlregex.test(textval);
}
function formatRegNum(obj) {
    var numbers = obj.value.replace(/\D/g, ''),
    char = { 4: '/', 11: '/', 13: '/'};
    obj.value = '';
    for (var i = 0; i < numbers.length; i++) {
        obj.value += (char[i] || '') + numbers[i];
    }
}
function formatVatNum(obj) {
    var numbers = obj.value.replace(/\D/g, ''), index = 1;
    if(obj.value.length == 1)
        index = 0;
    obj.value = '4';

    for (var i = index; i < numbers.length; i++) {
        obj.value += numbers[i];
    }
}

$(document).ready(function(){
    
    var vat_num = 0, reg_num = 0, phone = 0, website_address = 0, physical_address_line1 = 0, postal_address_line1 = 0;
    var company_type = 0, industry = 0, financial_year = 0, beee_level = 0, beee_certificate = 0;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    Dropzone.autoDiscover = false;
    
    var myDropzone = new Dropzone("div#beee_certificate", { 
        url: "/beee/upload",
        createImageThumbnails: true,
        parallelUploads: 2,
        maxFilesize: 10,
        filesizeBase: 1000,
    });

    myDropzone.on("sending", function(file, xhr, formData) {
        // Now, find your CSRF token
        var token = $("input[name='_token']").val();
        var id = $("#beee_id").val();
        // Append the token to the formData Dropzone is going to POST
        formData.append('_token', token);
        formData.append('id', id);
        beee_certificate = 1;
    });

    myDropzone.on("success", function() {
        var args = Array.prototype.slice.call(arguments);
        console.log(args);
        $("#beee_certificate_location").val(args[1].path);
        $("#beee_certificate").html("<p>" + args[1].file_name + "</p>");
        $(".beee_certificate_title").css("color", "#000000");
    });

    var text = "<img src='img/file_upload.svg'/>";
    $(".dz-default.dz-message").html(text + "<span>DROP FILE OR <span style='color:#f7a823'>CLICK TO UPLOAD</span></span>");
    $(".physical_address .manual").click(function(){
        $(".company_details_dialog.physical_address_dialog").css("height", "410px");
        $(".company_details_dialog .manual_address").show();
        $(".company_details_dialog.physical_address_dialog .physical_address_line1").css("width", "100%");
        $(".company_details_dialog.physical_address_dialog .manual").hide();
    });
    
    $("#country-listbox li").click(function(){
        var country_code = $(this).attr('data-dial-code');
        $("#country_code").val(country_code);
    })
    $("#same_as_physical_address").change(function(){
        if(this.checked){
            $(".form-control.postal_address_line1").val($(".form-control.physical_address_line1").val());
            $(".form-control.postal_address_line2").val($(".form-control.physical_address_line2").val());
            $(".form-control.postal_city").val($(".form-control.physical_city").val());
            $(".form-control.postal_state").val($(".form-control.physical_state").val());
            $(".form-control.postal_zip_code").val($(".form-control.physical_zip_code").val());
            $("#postal_country_name").val($(".form-control.physical_country").val());
            $('#postal_country_name').select2().trigger('change');
            if($(".form-control.postal_address_line1").val() != "")
                $(".postal_address_line1_title").css('color', '#000000');

            if($(".form-control.postal_address_line2").val() != "")
                $(".postal_address_line2_title").css('color', '#000000');

            if($(".form-control.postal_city").val() != "")
                $(".postal_city_title").css('color', '#000000');

            if($(".form-control.postal_state").val() != "")
                $(".postal_state_title").css('color', '#000000');

            if($(".form-control.postal_zip_code").val() != "")
                $(".postal_zip_code_title").css('color', '#000000');

            if($(".form-control.postal_country").val() != "")
                $(".postal_country_title").css('color', '#000000');
            
            postal_address_line1 = 1;
            physical_address_line1 = 1;
            if(checkValidataion_compnay_details() == 1)
                $("#company_details #next_btn").removeClass('inactive');                
        }
    });
    
    $("#reg_num").keyup(function(){
        var reg_num = new RegExp('^[0-9]{4}[\/][0-9]{7}[\/][0-9]{2}$');
        if(reg_num.test(this.value)){
            $(this).blur();
        }
        else{
            formatRegNum(this);
        }
    })
    $("#vat_num").keyup(function(){
        var reg_num = new RegExp('^[4][0-9]{9}$');
        if(reg_num.test(this.value)){
            $(this).blur();
        }
        else{
            formatVatNum(this);
        }
    })
    
    $("#company_details #save_btn").click(function(){
        $.ajax({
            url: '/store_company_detail',
            method: 'POST',
            data: {
                'email': $("#email").val(),
                'name': $("#name").val(),
                'reg_num': $("#reg_num").val(),
                'company_type': $("#company_type").val(),
                'industry': $("#industry").val(),
                'tel_num': $("#phone").val(),
                'country_code': $("#country_code").val(),
                'website_address': $("#website_address").val(),
                'financial_year_end': $("#financial_year").val(),
                'vat_num': $("#vat_num").val(),
                'beee_level': $("#beee_level").val(),
                'beee_certificate': $("#beee_certificate_location").val(),
                'physical_address_line1': $("#physical_address_line1").val(),
                'physical_address_line2': $("#physical_address_line2").val(),
                'physical_city': $("#physical_city").val(),
                'physical_state': $("#physical_state").val(),
                'physical_zip_code': $("#physical_zip_code").val(),
                'physical_country': $("#physical_country").val(),
                'postal_address_line1': $("#postal_address_line1").val(),
                'postal_address_line2': $("#postal_address_line2").val(),
                'postal_city': $("#postal_city").val(),
                'postal_state': $("#postal_state").val(),
                'postal_zip_code': $("#postal_zip_code").val(),
                'postal_country': $("#postal_country_name").val()
            },
            success: function(res){
            }
        })
    })
    $("#company_details #next_btn").click(function(){
        console.log(123);
        $("#company_details_form").submit();

        if(checkValidataion_compnay_details() == 1){
            $("#company_details_form").submit();
        }
    })
    
    $("input").focus(function(e){
        warningMessageActivate(this, "#000000", 0);
    });

    $("input").keydown(function(e){
        if($(this).val()!="")
        {
            var id = $(this).attr("id");
            id += " = 1;";
            eval(id);
        }
    })

    $("input").keyup(function(e){
        if(checkValidataion_compnay_details() == 1)
            $("#company_details #next_btn").removeClass('inactive');
        if($(this).val()!="")
        {
            warningMessageActivate(this, "#000000", 0);
        }
    })

    $("input").focusout(function(e){
        if(this.value == ""){
            warningMessageActivate(this, "#ff0000", 1);
        }
        else{
            warningMessageActivate(this, "#000000", 0);
        }
    })
    
    

    $(".item.company_type").change(function(){
        $(".item.company_type .dropdown.bootstrap-select button").css('color','#000000');
        company_type = 1;
    })

    $(".item.industry").change(function(){
        $(".item.industry .dropdown.bootstrap-select button").css('color','#000000');
        industry = 1;
    })

    $(".item.financial_year").change(function(){
        $(".item.financial_year .dropdown.bootstrap-select button").css('color','#000000');
        financial_year = 1;
    })

    $(".item.beee_level").change(function(){
        $(".item.beee_level .dropdown.bootstrap-select button").css('color','#000000');
        beee_level = 1;
    })
    function checkValidataion_compnay_details(){
        if($("#vat_num").val() == "")
            vat_num = 0;
        else
            vat_num = 1;
    
        if($("#reg_num").val() == "")
            reg_num = 0;
        else
            reg_num = 1;
    
        if($("#phone").val() == "")
            phone = 0;
        else
            phone = 1;
    
        if($("#website_address").val() == "")
            website_address = 0;
        else
            website_address = 1;
    
        if($("#physical_address_line1").val() == "")
            physical_address_line1 = 0;
        else
            physical_address_line1 = 1;
    
        if($("#postal_address_line1").val() == "")
            postal_address_line1 = 0;
        else
            postal_address_line1 = 1;
        
        if($("#company_type").val() == "")
            company_type = 0;
        else
            company_type = 1;
    
        if($("#industry").val() == "")
            industry = 0;
        else
            industry = 1;
    
        if($("#financial_year").val() == "")
            financial_year = 0;
        else
            financial_year = 1;
    
        if($("#beee_level").val() == "")
            beee_level = 0;
        else
            beee_level = 1;
    
        var result = vat_num*reg_num*phone*website_address*physical_address_line1*postal_address_line1*company_type*industry*financial_year*beee_level*beee_certificate;
    
        return result;
    }
})