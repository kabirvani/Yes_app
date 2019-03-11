@extends('layouts.app')

@section('content')
    @include ('company_details_layouts.dashboard_menu', ['contact_details' => true, 'my_commitment' => false, 'submit_payment' => false, 'percent' => '25'])
    <div id="company_details">
        <p>Contact Details</p>
        <h6>Company Application Form</h6>
        <img src="{{ asset('img/man.svg')}}" id="man_image" />
        
        <form method="POST" id="company_details_form" action="{{ route('show.my_commitment') }}">
            {{ csrf_field() }}
            
            <input hidden type="text" class="form-control" name="email" id="email" value="{{Auth::user()->email}}" />
        <input type="text" hidden name="id" id="id" class="form-control" value="{{Auth::user()->id}}"/>

            <div class="company_details_dialog" style="height: 310px;">
                @include ('company_details_layouts.contact_details_primary')
            </div>

            <div class="company_details_dialog" style="height: 310px;z-index:0; margin-bottom:50px;">
                @include ('company_details_layouts.contact_details_account')
            </div>
        </form>
        <form method="post" action="{{ route('back.company_detail') }}">
        {{ csrf_field() }}

            <div class="company_details_back">
                <button class="btn btn-primary" style="padding-top: 6px;">
                    <img style="width:8px;height:13px;margin-right: 24px; margin-top: -1px" src="{{ asset('img/icons8-expand2.svg') }}">
                    <small>BACK</small>
                </button>
            </div>
        </form>

        <div class="company_details_next">
            <div class="btn btn-primary inactive" id="next_btn">
                <small>NEXT</small>
                <img style="width:8px;height:13px;margin-left: 24px;" src="{{ asset('img/expand2.png') }}">
            </div>
        </div>

        <div class="company_details_save">
            <div class="btn btn-primary" id="save_btn">
                <small>SAVE</small>
                <img style="width:13px;height:13px;margin-left: 24px; margin-top: -1px;" src="{{ asset('img/icons8-save.svg') }}">
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/intlTelInput.min.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>
    <script src="{{ asset('js/contact_details.js') }}"></script>
@endsection

@section('styles')
    <link href="css/intlTelInput.min.css" rel="stylesheet">
@endsection