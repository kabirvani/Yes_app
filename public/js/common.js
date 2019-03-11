$(document).ready(function(){
    responsive();
    function responsive(){
        $(".stats_chart canvas").attr("width", $(".stats_chart").width());
        $(".stats_chart canvas").attr("height", $(".stats_chart").height());
        var width = $(window).width();
        var offset = width - 1080;
        offset = offset / 2;
        $("#company_details").css("padding-right", offset + "px");
        $("#company_details").css("padding-left", offset + 300 + "px");
        $("#man_image").css('right', offset - 150 + 'px');
        if(width < 1205){
            $("#man_image").hide();
            $("#company_details").css("padding-left", "360px");
        }
        else{
            $("#man_image").show();
        }
    }
    $(window).resize(function(){
        responsive();
    })
    
    var zero_count = 0, slash_first = -1, slash_second = -1, slash_third = -1;
    $(".selected-flag").click(function(){
        zero_count = 0, slash_first = -1, slash_second = -1, slash_third = -1;
    })
    function getPattern(obj){
        var tel_num_pattern = $(obj).attr('placeholder');
        
        if(tel_num_pattern[2] == ' ')
            zero_count = 2;
        if(slash_third > slash_second)
            slash_third = -1;
        if(slash_second > slash_first)
            slash_second = -1;
        for ( i = 0; i < tel_num_pattern.length; i++){
            if(tel_num_pattern[i] == ' ' || tel_num_pattern[i] == '-'){
                if(slash_second != -1)
                    slash_third = i - 2;
                else if(slash_first != -1 && slash_first != i)
                    slash_second = i - 1;
                else
                    slash_first = i;
            }
        }
    }
    $("input[type='tel']").keypress(function(){
        getPattern(this);
        $($(this).val() != "")
            formatPhone(this);
    })
    
    function formatPhone(obj) {
        var numbers = obj.value;
        numbers = numbers.replace('(0)', '');
        numbers = numbers.replace(/\D/g, '');
        obj.value = '';
        if(zero_count == 2){
            obj.value = '(0)' + obj.value;
        }
        for (var i = 0; i < numbers.length; i++) {
            if(i == slash_first || i == slash_second || i == slash_third)
                obj.value += ' - ' + numbers[i];
            else
                obj.value += '' + numbers[i];
        }
    }
})