@extends('layouts.app')

@section('content')
    @include ('company_details_layouts.dashboard_menu', ['contact_details' => false, 'my_commitment' => false, 'submit_payment' => false, 'percent' => 0])
    <div id="company_details">
        <p>Company Details</p>
        <h6>Company Application Form</h6>
        <img src="{{ asset('img/man.svg')}}" id="man_image" />
        
        <form method="POST" action="{{ route('show.contact_detail') }}" id="company_details_form">
            {{ csrf_field() }}
            
            <input hidden type="text" class="form-control" name="email" value="{{Auth::user()->email}}" id="email"/>
            <div class="company_details_dialog" style="height: 600px;">
                @include ('company_details_layouts.company_details')
            </div>
            
            <div class="company_details_dialog physical_address_dialog" style="height: 220px;z-index:1;">
                @include ('company_details_layouts.physical_address')
            </div>
            <div class="company_details_dialog" style="height: 410px;margin-bottom: 50px;z-index:1;">
                @include ('company_details_layouts.postal_address')
            </div>
        </form>
        <div class="company_details_back">
            <div class="btn btn-primary">
                <img style="width:8px;height:13px;margin-right: 24px; margin-top: -1px" src="{{ asset('img/icons8-expand2.svg') }}">
                <small>BACK</small>
            </div>
        </div>

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

@section('styles')
<link href="css/dropzone.css" rel="stylesheet">
<link href="css/bootstrap-select.min.css" rel="stylesheet">
<link href="{{ asset('css/select2.css') }}" rel="stylesheet">
<link href="{{ asset('css/intlTelInput.min.css') }}" rel="stylesheet">

@endsection

@section('scripts')
<script src="{{ asset('js/select2.js') }}"></script>
<script src="{{ asset('js/utils.js') }}"></script>
<script src="{{ asset('lib/bootstrap/dist/js/popper.js') }}"></script>
<script src="{{ asset('lib/bootstrap/dist/js/bootstrap.js') }}"></script>
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('js/dropzone.js') }}"></script>
<script src="{{ asset('js/dashboard.js') }}"></script>
@endsection