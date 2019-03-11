@extends('layouts.home_page_layout')
    
@section('content')
<div id="company_details" style="padding-top: 84px;">
    <form method="POST" id="company_details_form">
        {{ csrf_field() }}

        <input hidden type="text" class="form-control" name="email" value="{{Auth::user()->email}}" id="email"/>
        <div id="boost_confirm_form">
            <label>Confirm and Checkout</label>
            <p>Let’s confirm your YES Youth commitment and checkout.</p>
            <div class="host">
                <div class="label blue">IN-HOUSE ASSISTED</div>
                <div class="boost_confirm">
                    <div class="youth">
                        <p class="text_num"><span>{{$user['youth']}}</span></p>
                        <p class="text">YOUTH</p>
                    </div>
                    <div class="mul_icon">
                        <p>&#215;</p>
                    </div>
                    <div class="per_youth">
                        <p class="text_num">R<span id="per_youth">{{$user['per_youth']}}</span></p>
                        <p class="text">PER YOUTH</p>
                    </div>
                    <div class="equal_icon">
                        <div></div>
                    </div>
                    <div class="excluding_vat">
                        <p class="text_num">R<span>{{$user['excluding_vat']}}</span></p>
                        <p class="text">EXCLUDING VAT</p>
                    </div>
                </div>
            </div>

            <div class="company_details_dialog download_invoice">
                <div class="title">
                    <p style="text-align:left;color:#03badd">Download Invoice</p>
                </div>
                <div class="yellow_line" style="background-color:#03badd"></div>
                <div class="content">
                    <div class="item" style="margin-right: 30px;">
                        <p style="color: #000000;">Company Name</p>
                        <input type="text" value="{{Auth::user()->name}}" class="disabled"/>
                        <input type="text" hidden name="name" id="name" class="form-control" value="{{Auth::user()->name}}"/>
                    </div>
                    <div class="item">
                        <p class="po_num_title">PO Number (optional)</p>
                        <input type="" name="po_num" class="form-control" id="po_num"/>
                    </div>
                    <div class="btn btn-primary pink" style="width:160px;background-color:#03badd">
                        DOWNLOAD INVOICE
                    </div>
                </div>
            </div>

            <div class="payment_alert blue">
                <svg width="36px" height="36px" viewBox="0 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                    <!-- Generator: Sketch 53.2 (72643) - https://sketchapp.com -->
                    <g id="Company-Portal" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                        <g id="Demand-Shaping---In-House-Checkout" transform="translate(-499.000000, -489.000000)" fill="#FFFFFF">
                            <g id="Group" transform="translate(499.000000, 489.000000)">
                                <circle id="Oval" opacity="0.3" cx="18" cy="18" r="18"></circle>
                                <g id="icons8-payment_history" transform="translate(10.000000, 12.000000)" fill-rule="nonzero">
                                    <path d="M1.5,0 C0.675781,0 0,0.675781 0,1.5 L0,6.5 C0,7.324219 0.675781,8 1.5,8 L8,8 L8,7 L2,7 C2,6.453125 1.546875,6 1,6 L1,2 C1.546875,2 2,1.546875 2,1 L12,1 C12,1.546875 12.453125,2 13,2 L13,5 L14,5 L14,1.5 C14,0.675781 13.324219,0 12.5,0 L1.5,0 Z M7,2 C5.902344,2 5,2.902344 5,4 C5,5.097656 5.902344,6 7,6 C8.097656,6 9,5.097656 9,4 C9,2.902344 8.097656,2 7,2 Z M3,3 C2.449219,3 2,3.449219 2,4 C2,4.550781 2.449219,5 3,5 C3.550781,5 4,4.550781 4,4 C4,3.449219 3.550781,3 3,3 Z M7,3 C7.558594,3 8,3.441406 8,4 C8,4.558594 7.558594,5 7,5 C6.441406,5 6,4.558594 6,4 C6,3.441406 6.441406,3 7,3 Z M11,3 C10.449219,3 10,3.449219 10,4 C10,4.550781 10.449219,5 11,5 C11.550781,5 12,4.550781 12,4 C12,3.449219 11.550781,3 11,3 Z M9,6 L9,7 L10,7 L10,8 C10,8.597656 10.273438,9.132813 10.695313,9.5 C10.273438,9.867188 10,10.402344 10,11 L10,12 L9,12 L9,13 L15,13 L15,12 L14,12 L14,11 C14,10.402344 13.726563,9.867188 13.304688,9.5 C13.726563,9.132813 14,8.597656 14,8 L14,7 L15,7 L15,6 L9,6 Z M11,7 L13,7 L13,8 C13,8.558594 12.558594,9 12,9 C11.441406,9 11,8.558594 11,8 L11,7 Z M12,10 C12.558594,10 13,10.441406 13,11 L13,12 L11,12 L11,11 C11,10.441406 11.441406,10 12,10 Z" id="Shape"></path>
                                </g>
                            </g>
                        </g>
                    </g>
                </svg>
                <div>
                <p class="title">PAYMENT PENDING</p>
                <p class="msg">Your payment is pending. Once received, we will process this youth placement.</p>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>

    function warningMessageActivate(e, color, opacity){
        var id = $(e).attr("id");
        $("."+id+"_title").css('color',color);
        $(".warning_message."+id).css('opacity',opacity);
    }
    $(document).ready(function(){
        $("input").focus(function(e){
            warningMessageActivate(this, "#000000", 0);
        });
        $("input").focusout(function(e){
            if(this.value == ""){
                warningMessageActivate(this, "#9ca8ae", 1);
            }
            else{
                warningMessageActivate(this, "#000000", 0);
            }
        })
    })
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
@endsection