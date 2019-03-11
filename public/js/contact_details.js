$(document).ready(function(){

    var primary_first_name = 0, primary_last_name = 0, primary_phone = 0, account_first_name = 0, account_last_name = 0, account_phone = 0, account_email = 0;
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#primary_phone_dialog #country-listbox li").click(function(){
        var country_code = $(this).attr('data-dial-code');
        $("#primary_country_code").val(country_code);
    })
    $("#account_phone_dialog #country-listbox li").click(function(){
        var country_code = $(this).attr('data-dial-code');
        $("#account_country_code").val(country_code);
    })

    $("#company_details #save_btn").click(function(){
        $.ajax({
            url: '/store_contact_detail',
            method: 'POST',
            data: {       
                'email': $("#email").val(),
                'primary_first_name': $("#primary_first_name").val(),
                'primary_last_name': $("#primary_last_name").val(),
                'primary_phone': $("#primary_phone").val(),
                'primary_country_code': $("#primary_country_code").val(),
                'account_first_name': $("#account_first_name").val(),
                'account_last_name': $("#account_last_name").val(),
                'account_phone': $("#account_phone").val(),
                'account_country_code': $("#account_country_code").val(),
                'account_email': $("#account_email").val()
            },
            success: function(res){

            }
        })
    })
    $("#company_details #next_btn").click(function(){
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
    
    function warningMessageActivate(e, color, opacity){
        var id = $(e).attr("id");
        $("."+id+"_title").css('color',color);
        $(".warning_message."+id).css('opacity',opacity);
    }

    
    function checkValidataion_compnay_details(){
        if($("#primary_first_name").val() == "")
            primary_first_name = 0;
        else
            primary_first_name = 1;

        if($("#primary_last_name").val() == "")
            primary_last_name = 0;
        else
            primary_last_name = 1;

        if($("#primary_phone").val() == "")
            primary_phone = 0;
        else
            primary_phone = 1;

        if($("#account_first_name").val() == "")
            account_first_name = 0;
        else
            account_first_name = 1;
        
        if($("#account_last_name").val() == "")
            account_last_name = 0;
        else
            account_last_name = 1;

        if($("#account_phone").val() == "")
            account_phone = 0;
        else
            account_phone = 1;

        if($("#account_email").val() == "")
            account_email = 0;
        else
            account_email = 1;
            
        var result = primary_first_name *primary_last_name *primary_phone *account_first_name *account_last_name *account_phone *account_email;
        return result;
    }
})