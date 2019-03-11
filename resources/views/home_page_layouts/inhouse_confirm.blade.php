@extends('layouts.home_page_layout')
    
@section('content')
<div id="company_details" style="padding-top: 84px;">
    <form method="POST" action="{{route('show.inhouse_checkout')}}" id="company_details_form">
        {{ csrf_field() }}

        <input hidden type="text" class="form-control" name="email" value="{{Auth::user()->email}}" id="email"/>
        <input hidden type="text" class="form-control" name="name" value="{{Auth::user()->name}}" id="name"/>
        <div id="boost_confirm_form">
            <label>How many Youth would you like to place?</label>
            <p>Enter the number of Yes Youth that you would like within your organisation or supply chain. </p>
            <div class="host">
                <div class="label green">IN-HOUSE</div>
                <div class="boost_confirm">
                    <div class="youth">
                        <input class="text_num green" id="youth" placeholder="0" type="text">
                        <input hidden class="form-control" type="text" id="youth_hidden" name="youth" />
                        <p class="text">YOUTH</p>
                    </div>
                    <div class="mul_icon">
                        <p>&#215;</p>

                    </div>
                    <div class="per_youth">
                        <p class="text_num">R<span id="per_youth">{{$user['per_year']}}</span></p>
                        <input hidden class="form-control" type="text" id="per_youth_hidden" name="per_youth" val="{{$user['per_year']}}"/>
                        <p class="text">PER YOUTH</p>
                    </div>
                    <div class="equal_icon">
                        <div></div>
                    </div>
                    <div class="excluding_vat">
                        <input class="text_num" id="excluding_vat" placeholder="R0" type="text">
                        <input hidden class="form-control" type="text" id="excluding_vat_hidden" name="excluding_vat" />

                        <p class="text">EXCLUDING VAT</p>
                    </div>
                </div>
            </div>
            <div class="btn btn-primary back">
                <img style="width:8px;height:13px;margin-right: 24px; margin-top: -1px" src="{{ asset('img/icons8-expand2.svg') }}">
                <small>BACK</small>
            </div>
            <div class="btn btn-primary next green">
                <small>CONFIRM</small>
                <img style="width:8px;height:13px;margin-left: 13px;margin-top:-3px;" src="{{ asset('img/expand2.png') }}">
            </div>
        </div>
    </form>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        var youth = 0, excluding_vat = 0, per_youth;
        per_youth = $("#boost_confirm_form .host .boost_confirm .per_youth #per_youth").html();
        per_youth = per_youth.replace(/,/g, "");
        per_youth = parseFloat(per_youth);

        $("#boost_confirm_form .host .boost_confirm .youth #youth").keyup(function(){
            youth = parseFloat($(this).val());
            excluding_vat = per_youth * youth;
            excluding_vat = excluding_vat.toString();
            $("#boost_confirm_form .host .boost_confirm .excluding_vat #excluding_vat").val("R" + numberWithCommas(excluding_vat));
        });
        $(".btn.btn-primary.next").click(function(){
            $("#per_youth_hidden").val(per_youth);
            $("#youth_hidden").val(youth);
            $("#excluding_vat_hidden").val(excluding_vat);
            $("#company_details_form").submit();
        })
    })
    function numberWithCommas(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }
</script>
@endsection