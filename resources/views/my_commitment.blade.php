@extends('layouts.app')

@section('content')
@include ('company_details_layouts.dashboard_menu', ['contact_details' => true, 'my_commitment' => true, 'submit_payment' => false, 'percent' => '50'])
<div id="company_details">
    <p>My Commitment</p>
    <h6>Company Application Form</h6>
    <img src="{{ asset('img/man.svg')}}" id="man_image" />
    
    <form method="POST" id="company_details_form" action="">
        {{ csrf_field() }}
        
        <input hidden type="text" class="form-control" name="email" value="{{Auth::user()->email}}" />
        <div class="company_details_dialog" style="height: 201px; margin-bottom: 0px;">
            @include ('my_commitment_layouts.calculate')
        </div>
        <div>
            @include ('my_commitment_layouts.select_commitment')
        </div>
        <div class="company_details_dialog" id="yes_commitment" style="height: 237px;z-index:0; margin-bottom:50px;margin-top: 30px;display:none;">
            @include ('my_commitment_layouts.yes_commitment')
        </div>
    </form>

    <form method="post" action="{{ route('back.contact_detail') }}">
        {{ csrf_field() }}
        <div class="company_details_back">
            <button class="btn btn-primary" style="padding-top: 6px;">
                <img style="width:8px;height:13px;margin-right: 24px; margin-top: -1px" src="{{ asset('img/icons8-expand2.svg') }}">
                <small>BACK</small>
            </button>
        </div>
    </form>

    <form method="POST" action="{{ route('show.submit_payment') }}">
        {{ csrf_field() }}
        <input type="text" hidden name="regFee" id="regFee"/>
        <input type="text" hidden name="youth" id="youth_jobs"/>
        <div class="company_details_next">
            <div class="btn btn-primary inactive" id="next_btn">
                <small>SUBMIT</small>
                <img style="width:14px;height:10px;margin-left: 20px;" src="{{ asset('img/submit.svg') }}">
            </div>
        </div>
    </form>

    <div class="company_details_save">
        <div class="btn btn-primary" id="save_btn">
            <small>SAVE</small>
            <img style="width:13px;height:13px;margin-left: 24px; margin-top: -1px;" src="{{ asset('img/icons8-save.svg') }}">
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('js/utils.js') }}"></script>
    <script src="{{ asset('js/my_commitment.js') }}"></script>
@endsection

@section('styles')
<style>
.clear_result:hover{
    cursor: pointer;
}
</style>
@endsection