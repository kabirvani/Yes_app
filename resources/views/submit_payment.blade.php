@extends('layouts.app')

@section('content')
@include ('company_details_layouts.dashboard_menu', ['contact_details' => true, 'my_commitment' => true, 'submit_payment' => true, 'percent' => '75'])
<div id="company_details">
    <p>Pledge and Payment</p>
    <h6>Company Application Form</h6>
    <img src="{{ asset('img/man.svg')}}" id="man_image" />
    
    <form method="GET" id="company_details_form" action="{{ route('send.pledge') }}">
        {{ csrf_field() }}
        
        <input hidden type="text" class="form-control" name="email" value="{{Auth::user()->email}}" />
        
        <div class="company_details_dialog" id="submit_your_payment" style="height: 176px;margin-bottom:30px;margin-top: 56px">
            <div class="title">
                <p style="float: left;">Submit your payment</p>
            </div>
            <div class="yellow_line"></div>
            <div class="content">
                <p class="yes_commitment_text">
                In order to finalise your registration we require the registration fee to be paid. Please download the invoice below and the vendor pack, if necessary, and submit to your accounts department for payment. As soon as the payment reflects in our bank account we will approve your registration.
                </p>
            </div>
        </div>

        <div class="company_details_dialog" id="ceo_pledge">
            <div class="title">
                <p style="float: left;">CEO Pledge</p>
            </div>
            <div class="yellow_line"></div>
            <div class="content">
                <div class="item" style="margin-bottom:3px">
                    <div class="oval">
                        <p class="ceo_first_name_title">CEO First Name</p>
                    </div>
                    <input type="text" class="form-control ceo_first_name" name="ceo_first_name" id="ceo_first_name" placeholder="First Name" />
                    <p class="warning_message ceo_first_name">CEO First Name is required</p>
                </div>

                <div class="item" style="margin-bottom:3px;">
                    <div class="oval">
                        <p class="ceo_email_title">CEO Email Address</p>
                    </div>
                    <input type="text" class="form-control ceo_email" name="ceo_email" id="ceo_email" placeholder="Email Address" />
                    <p class="warning_message ceo_email">CEO Email Address is required</p>
                </div>

                <div class="send_pledge">
                    <p>SEND PLEDGE</p>
                </div>
            </div>
            <div class="payment_alert pink">
                <svg width="36px" height="36px" viewBox="0 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
                    <p class="title">PLEDGE PENDING</p>
                    <p class="msg">Your CEO Pledge is pending. Once received, you will be notified of next steps via email </p>
                </div>
            </div>
        </div>

        <div class="company_details_dialog" id="download_invoice">
            <input type="text" hidden name="name" id="name" value="{{Auth::user()->name}}"/>
            <input type="text" hidden name="email" id="email" value="{{Auth::user()->email}}"/>
            <input type="text" hidden name="youth" id="youth" value="{{$user['youth']}}"/>
            <input type="text" hidden name="regFee" id="regFee" value="{{$user['regFee']}}"/>
            <input type="text" hidden name="invoiceUrl" id="invoiceUrl" value="{{Auth::user()->name}}"/>
            <input type="text" hidden name="supportUrl" id="supportUrl" value="#"/>

            <div class="title">
                <p style="float: left;">Download Invoice</p>
            </div>
            <div class="yellow_line"></div>
            <div class="content">
                <div class="item" style="margin-bottom:3px">
                    <div class="oval">
                        <p class="name_title" style="color:black;">Company Name</p>
                    </div>
                    <input type="text" class="form-control name disabled" name="name" value="{{Auth::user()->name}}" />
                </div>

                <div class="item" style="margin-bottom:3px;">
                    <div class="oval">
                        <p class="po_num_title">PO Number (optional)</p>
                    </div>
                    <input type="text" class="form-control po_num" name="po_num" id="po_num"/>
                </div>

                <div class="download_invoice">
                    <p>DOWNLOAD INVOICE</p>
                </div>
            </div>
            <div class="payment_alert pink">
                <svg width="36px" height="36px" viewBox="0 0 36 36" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
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
    <script src="{{ asset('js/ceo_pledge.js') }}"></script>
@endsection