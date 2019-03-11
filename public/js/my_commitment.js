$(document).ready(function(){
    var isSelectCommitment = false;

    function rmvClass(){
        $(".select_commitment .item").removeClass("selected");
        $(".select_commitment .item_tag").removeClass("selected");
    }
    $(".clear_result").click(function(){
        rmvClass();
        $("#company_details #next_btn").addClass('inactive');
        $(".select_commitment").hide();
        $("#yes_commitment").hide();
        $("#read_accept_yes_commitment").attr('checked',false);
        $("#total_anual_revenue").val("");
        $("#average_npat").val("");
        $("#total_headcount").val("");
    })
    $(".select_commitment .item .select_commitment_btn").click(function(){
        var index = $(".select_commitment .item .select_commitment_btn").index(this);
        var youth_job = $(".select_commitment .item .jobs_num p:eq("+index+")").html();
        $("#youth_jobs").val(youth_job);
        rmvClass();
        var check_ico = '<img class="select_commit_check_icon" src="img/select_commit_check.svg" />';
        $(this).html("MY COMMITMENT" + check_ico);
        $(".select_commitment .item:eq("+index+")").addClass("selected");
        $(".select_commitment .item_tag:eq("+index+")").addClass("selected");
        isSelectCommitment = true;
        $("#yes_commitment").show();
    })

    $("#read_accept_yes_commitment").change(function(){
        if(this.checked && isSelectCommitment == true){
            $("#company_details #next_btn").removeClass('inactive');
        }
        else{
            $("#company_details #next_btn").addClass('inactive');
        }
    })

    $(".calculate_go").click(function(){
        $(".select_commitment").show();
        var total_anual = parseFloat($("#total_anual_revenue").val().replace(/,/g,''));
        var headcount = parseFloat($("#total_headcount").val().replace(/,/g,''));
        var jobs_num = 0;
        if(total_anual <= 10000000)
            $("#regFee").val("FREE");
        else if(total_anual <= 50000000)
            $("#regFee").val("R2,500");
        else if(total_anual <= 100000000)
            $("#regFee").val("R10,000");
        else if(total_anual <= 199000000)
            $("#regFee").val("R15,000");
        else
            $("#regFee").val("R20,000");

        if(total_anual < 50000000)
        {
            jobs_num = (headcount + 1) / 20;
        }
        else{
            var npat = parseFloat($("#average_npat").val());
            npat = Math.ceil(npat *1.5/ 5500000);
            headcount = Math.ceil(headcount * 1.5 / 100);
            total_anual = total_anual / 1000000;
            
            if(total_anual < 75)
                total_anual = 6;
            else
                total_anual = Math.ceil((total_anual + 1) / 50) + 5;
            jobs_num = Math.max(headcount, npat, total_anual);
        }
        $("#first_level_jobs p").html(numberWithCommas(Math.ceil(jobs_num)));
        $("#second_level_jobs p").html(numberWithCommas(Math.ceil(jobs_num + jobs_num * 3 / 10)));
        $("#third_level_jobs p").html(numberWithCommas(Math.ceil(jobs_num * 2)));
        
    })

    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    $("#company_details #save_btn").click(function(){

    })
    $("#company_details #next_btn").click(function(){
        var form = this.closest('form');
        form.submit();
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

    $("#total_anual_revenue").keyup(function(){
        var comma = /,/g;
        var total_anual = parseFloat($("#total_anual_revenue").val().replace(comma, ''));
        if(total_anual >= 50000000)
            $("#average_npat").removeClass('disabled');
        else
            $("#average_npat").addClass('disabled');
        
    })

    $("input[type='text']").keyup(function(){
        var num = $(this).val();
        var comma = /,/g;
        num = num.replace(comma,'');
        hidden = $(this).attr("id")+"_num";
        $("."+hidden).val(num);
        var numCommas = addCommas(num);
        $(this).val(numCommas);
    })

    function addCommas(nStr) {
        nStr += '';
        var comma = /,/g;
        nStr = nStr.replace(comma,'');
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    $("input").keyup(function(e){
        if(calculationValidate() == 1)
            $(".calculate_go").removeClass('inactive');

        else
            $(".calculate_go").addClass('inactive');

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
        $(".calc_r_div." + id).css('color',color);
        $(".warning_message."+id).css('opacity',opacity);
    }

    
    function calculationValidate(){
        var annual = $("#total_anual_revenue").val().replace(/,/g,'');
        var headcount = $("#total_headcount").val().replace(/,/g,'');

        if(annual == "" || headcount == "")
            return 0;
        annual = parseFloat(annual);
        headcount = parseFloat(headcount);

        if(annual < 50000000 && headcount >=800)
            return 0;
        return 1;
    }
})