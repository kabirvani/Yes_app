@extends('layouts.home_page_layout')
    
@section('content')
<div id="company_details" style="padding-top: 84px;">
    <div id="company_details_form">
        <input hidden type="text" class="form-control" name="email" value="{{Auth::user()->email}}" id="email"/>        
        <div id="demand_shaping_dashboard">
            <label>{{Auth::user()->name}}, let’s create your first work experience.</label>
            <p>You don’t need to add all of your youth at once and you can select a combination of the packages below to meet your YES target. </p>
            <div class="item" style="margin-right: 30px;">
                <div class="item_title green">
                    <p>IN-HOUSE</p>
                </div>
                <div class="content">
                    <p class="first">Source your own YES Youth for your business or supplychain.</p>
                    <p class="second">R5,000</p>
                    <p class="third">PER YOUTH, ONCE OFF</p>
                    <p class="fourth">once off management, monitoring and evaluation fee</p>
                </div>
                <div class="select_btn btn green">
                    <form method="GET" action="{{ route('show.inhouse_confirm')}}">
                        {{ csrf_field() }}
                        <button type="submit">SELECT PACKAGE</button>
                    </form>
                </div>
            </div>

            <div class="item" style="margin-right: 30px;">
                <div class="item_title blue">
                    <p>IN-HOUSE ASSISTED</p>
                </div>
                <div class="content">
                    <p class="first">Includes sourcing of YES Youth for your business.</p>
                    <p class="second">R7,000</p>
                    <p class="third">PER YOUTH, ONCE OFF</p>
                    <p class="fourth">once off management, monitoring and evaluation fee</p>
                </div>
                <div class="select_btn btn blue">
                    <form method="GET" action="{{ route('show.inhouseassisted_confirm')}}">
                        {{ csrf_field() }}
                        <button type="submit">SELECT PACKAGE</button>
                    </form>
                </div>
            </div>

            <div class="item">
                <div class="item_title pink">
                    <p>BOOST A BUSINESS</p>
                </div>
                <div class="content">
                    <p class="first">Place YES Youth inside a verified host business</p>
                    <p class="second">R9,000</p>
                    <p class="third">PER YOUTH, ONCE OFF</p>
                    <p class="fourth">once off management, monitoring and evaluation fee</p>
                </div>
                <div class="select_btn btn pink">
                    <form method="GET" action="{{ route('show.boost_confirm')}}">
                        {{ csrf_field() }}
                        <button type="submit">SELECT PACKAGE</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection