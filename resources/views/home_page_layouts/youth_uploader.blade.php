@extends('layouts.home_page_layout')
<style>
    .txtedit{
        display: none;
        width: 99%;
        height: 30px;
    }
    .tbl_heading{
        color: #9aa8af;
        font-size: 12px;
        font-weight: 600;
        padding: 14px 18px !important;
    }
    .In-House-Youth-Uploa{
        width: 158.5px !important; */
        height: 16.5px; 
        font-family: Roboto;
        font-size: 20px;
        font-weight: bold;
        /*line-height: 11vh;*/
        letter-spacing: normal;
        color: black;
    }
    .table td {
        position: relative;
        font-family: Roboto;
        font-size: 15px;
        font-weight: 500;
        font-style: normal;
        font-stretch: normal;
        line-height: normal;
        letter-spacing: normal;
        /*text-transform: capitalize;*/
        padding: 17px 18px !important;
    }
    .table-bordered td {
        border: 1px solid #e3e7eb !important;
    }
    img.svg { fill: black; }
    /*.tbl_head_no{
        width: 20px;
        height: 20px;
    }
    .tbl_head_title{
        width: 29.5px;
        height: 20px;
    }
    .tbl_head_name{
        width: 65px;
        height: 20px;
    }
    .tbl_head_rsa{
        width: 80px;
        height: 20px;
    }
    .tbl_head_job{
        width: 75px;
        height: 20px;
    }
    .tbl_head_workAdd{
        width: 115px;
        height: 20px;
    }
    .tbl_head_gender{
        width: 40.5px;
        height: 20px;
    }*/
    .table td{
        position:relative;
    }
</style>
@section('content')
<div id="company_details">
    <div class="row">
        <div class="col-md-5 In-House-Youth-Uploa">
            <p>In-House Youth Uploader</p>
        </div>
        <div class="col-md-3">
           <button id="autosavediv" type="button" class="btn btn-primary btn-lg" style="border-color: #4cd964;background-color: #4cd964;width: 110px;font-size: 10px;height: 20px;padding-top: 1px;border-radius: 20px;display: none;">Auto Saving..</button> 
        </div>
        <div class="col-md-2">
            <div class="company_details_save">
                <div class="btn btn-primary" id="save_btn"  style="background-color: #ecf0f5;border-color: #c3d836;color: #c3d836;width: 105px;height: 40px;border-radius: 3px;padding-top: 8px;">
                    <small style="font-size: 11px;">SAVE</small>
                    <img style="width:13px;height:13px;margin-left: 20px; margin-top: -1px" class="svg" src="{{ asset('img/icons8-save.svg') }}">
                </div>
            </div>
        </div>
        <div class="col-md-2">
            <form method="POST" action="">
                {{ csrf_field() }}
                <div class="company_details_next">
                    <div class="btn btn-primary" id="next_btn" style="background-color: #c3d836;border-color: #c3d836;width: 105px;height: 40px;border-radius: 3px;padding-top: 8px;">
                        <small style="font-size: 11px;">FINISH</small>
                        <img style="width:14px;height:10px;margin-left: 14px;" src="{{ asset('img/submit.svg') }}">
                    </div>
                </div>
            </form>
        </div>
    </div>
        
    <form method="POST" id="company_details_form" action="">
        {{ csrf_field() }}
        
        <input hidden type="text" class="form-control" name="email" value="{{Auth::user()->email}}" />

        <!-- Editable table -->
        <div class="card">    
            <!-- <div class="card-body"> -->
              <!-- <div id="table" class="table-editable">  -->
          <div class="table-responsive">
            <table class="table table-bordered table-responsive-md text-center" style="background-color: #fff;margin-bottom: 0px;font-family: Roboto;font-style: normal; table-layout: fixed; white-space: nowrap; display: block; width: 100%;">
              <tr>
                <th class="text-center tbl_heading tbl_head_no" style="width: 20px;height: 20px;">NO</th>
                <th class="text-center tbl_heading tbl_head_title">TITLE</th>
                <th class="text-center tbl_heading tbl_head_name">FIRST NAME</th>
                <th class="text-center tbl_heading tbl_head_name">LAST NAME</th>
                <th class="text-center tbl_heading tbl_head_rsa">RSA IN NUMBER</th>
                <th class="text-center tbl_heading tbl_head_name">START DATE</th>
                <th class="text-center tbl_heading tbl_head_job">JOB TITLE </th>
                <th class="text-center tbl_heading tbl_head_workAdd">WORK ADDRESS</th>
                <th class="text-center tbl_heading tbl_head_gender">GENDER</th>
                <th class="text-center tbl_heading tbl_head_gender">RACE</th>
                <th class="text-center tbl_heading tbl_head_gender">DISABLED</th>
                <th class="text-center tbl_heading tbl_head_gender">EMPLOYEE NUMBER</th>
                <th class="text-center tbl_heading tbl_head_gender">MONTHLY SALARY</th>
                <th class="text-center tbl_heading tbl_head_gender">PRIMARY EMAIL</th>
                <th class="text-center tbl_heading tbl_head_gender">SUPERVISOR FIRST NAME</th>
                <th class="text-center tbl_heading tbl_head_gender">SUPERVISOR LAST NAME</th> 
                <th class="text-center tbl_heading tbl_head_gender">SUPERVISOR MOBILE NUMBER</th>
                <th class="text-center tbl_heading tbl_head_gender">SUPERVISOR EMAIL</th>
              </tr>
               @foreach($data as $data)
        <tr>
            <td style="height: 20px;"> 
                <div  class='edit' id='id.{{ $data->id }}'> 
                  {{ $data->id }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'title', '{{ $data->id }}')" id='title.{{ $data->id }}'> 
                  {{ $data->title }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'first_name', '{{ $data->id }}')" id='first_name.{{ $data->id }}'> 
                  {{ $data->first_name }}
                </div> 
            </td>
         <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'last_name', '{{ $data->id }}')" id='last_name.{{ $data->id }}'> 
                  {{ $data->last_name }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'id_number', '{{ $data->id }}')" id='id_number.{{ $data->id }}'> 
                  {{ $data->id_number }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'start_date', '{{ $data->id }}')" id='start_date.{{ $data->id }}'> 
                  {{ $data->start_date }}
                </div> 
            </td>
             <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'job_title', '{{ $data->id }}')" id='job_title.{{ $data->id }}'> 
                  {{ $data->job_title }}
                </div> 
            </td>
             <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'work_address', '{{ $data->id }}')" id='work.address_{{ $data->id }}'> 
                  {{ $data->work_address }}
                </div> 
            </td>
             <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'gender', '{{ $data->id }}')" id='gender.{{ $data->id }}'> 
                  {{ $data->gender }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'race', '{{ $data->id }}')" id='race.{{ $data->id }}'> 
                  {{ $data->race }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'disabled', '{{ $data->id }}')" id='disabled.{{ $data->id }}'> 
                  {{ $data->disabled }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'employee_number', '{{ $data->id }}')" id='employee_number.{{ $data->id }}'> 
                  {{ $data->employee_number }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'monthly_salary', '{{ $data->id }}')" id='monthly_salary.{{ $data->id }}'> 
                  {{ $data->monthly_salary }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'primary_email', '{{ $data->id }}')" id='primary_email.{{ $data->id }}'> 
                  {{ $data->primary_email }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'sup_first_name', '{{ $data->id }}')" id='sup_first_name.{{ $data->id }}'> 
                  {{ $data->sup_first_name }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'sup_last_name', '{{ $data->id }}')" id='sup_last_name.{{ $data->id }}'> 
                  {{ $data->sup_last_name }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'sup_mobile', '{{ $data->id }}')" id='sup_mobile.{{ $data->id }}'> 
                  {{ $data->sup_mobile }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' onBlur="saveToDatabase(this, 'sup_email', '{{ $data->id }}')" id='sup_email.{{ $data->id }}'> 
                  {{ $data->sup_email }}
                </div> 
            </td>

        
        </tr>
        @endforeach 
               
            </table>
          </div>
              <!-- </div> -->
            <!-- </div> -->
        </div>
        <!-- Editable table -->
    </form>

 
   
</div>

@endsection





@section('scripts')
<script>

function saveToDatabase(editableObj,field_name, edit_id) { 

    $(editableObj).addClass('editMode');
    let value = $.trim($(editableObj).text());
    console.log(">>>>>", value, field_name)

    var _token = '<?php echo csrf_token() ?>';

    $.ajax({
        url:"{!! url('save_youth_data') !!}",
        type: 'post',
        dataType:'json',
        data: { field:field_name, value:value, id:edit_id ,_token:_token},
        success:function(response) {
            if(response.status == 'yes'){
                $('#autosavediv').show();
               setTimeout(function() { $("#autosavediv").hide(); }, 700);
            }
        }
    });

};

$(document).ready(function(){
 
 // Add Class
$('.edit').click(function(){
  $(this).addClass('editMode');
});

 // Save data
// $(".edit").focusout(function(){
//     $(this).removeClass("editMode");
//     var id = this.id;
//     var split_id = id.split(".");
//     var field_name = split_id[0];
//     var edit_id = split_id[1];
//     var value = $(this).text();
//     var _token = '<?php echo csrf_token() ?>';
    

// });

});
</script>
@endsection