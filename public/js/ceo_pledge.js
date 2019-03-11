$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $("#ceo_pledge .send_pledge").click(function(){
        // $.ajax({
        //     url: '/send_pledge',
        //     method: 'GET',
        //     success: function(res){
        //         console.log(res);
        //         $("#ceo_pledge").css('height', '262px');
        //         $("#ceo_pledge .payment_alert").show();
        //     }
        // })
        $("#company_details_form").submit();
    })

    $("#download_invoice .download_invoice").click(function(){
        $.ajax({
            url: '/download_invoice',
            method: 'POST',
            data: {
                'email': $("#email").val(),
                'name': $("#name").val(),
                'youth': $("#youth").val(),
                'regFee': $("#regFee").val(),
                'invoiceUrl': $("#invoiceUrl").val(),
                'supportUrl': $("#supportUrl").val(),
            },
            success: function(res){
                console.log(res);
                $("#download_invoice").css('height', '262px');
                $("#download_invoice .payment_alert").show();
            }
        })
    })
})