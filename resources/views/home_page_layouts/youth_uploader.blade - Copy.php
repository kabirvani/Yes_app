@extends('layouts.home_page_layout')
    <style>
        .txtedit{
 display: none;
 width: 99%;
 height: 30px;
}
    </style>
@section('content')
<div id="company_details" style="padding-top: 84px;">
    <div class="row">
     
        <div class="card">
    
        <div class="row">
     <div class="col-md-12">
       <h3 class="card-header text-left font-weight-bold text-uppercase py-4">In-House Youth Uploader</h3>
     </div>
      </div>
      <div class="row" style="margin-top: 10px;margin-right: 10px">
        <div class="col-md-2"></div>
        <div class="col-md-6">
        
           <form action="{{ url('importExcel') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="file" required name="import_file" />
                 <button type="submit" class="btn btn-danger pull-right">Import</button>
            </form>
       </div>
      
        <div class="col-md-2">
           <button type="button" class="btn btn-primary pull-right">Save</button>
        </div>
        <div class="col-md-2">
           <button type="button" class="btn btn-primary pull-right" style="background-color: #c3d836;border-color: #c3d836;">Finish</button>
        </div>
 </div>
  
  <div class="card-body">
    <div id="table" class="table-editable">
      <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i class="fas fa-plus fa-2x"
            aria-hidden="true"></i></a></span>
      <table class="table table-bordered table-responsive-md text-center">
        <tr>
          <th class="text-center">No</th>
          <th class="text-center">Title</th>
          <th class="text-center">First Name</th>
          <th class="text-center">Last Name</th>
          <th class="text-center">RSA Id Number</th>
          <th class="text-center">Start Date</th>
          <th class="text-center">Job Title</th>
          <th class="text-center">Work Address</th>
          <th class="text-center">Gender</th>
        </tr>
        
        @foreach($data as $data)
        <tr>
            <td> 
                <div contentEditable='true' class='edit' id='id.{{ $data->id }}'> 
                  {{ $data->id }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' id='title.{{ $data->id }}'> 
                  {{ $data->title }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' id='first_name.{{ $data->id }}'> 
                  {{ $data->first_name }}
                </div> 
            </td>
         <td> 
                <div contentEditable='true' class='edit' id='last_name.{{ $data->id }}'> 
                  {{ $data->last_name }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' id='id_number.{{ $data->id }}'> 
                  {{ $data->id_number }}
                </div> 
            </td>
            <td> 
                <div contentEditable='true' class='edit' id='start_date.{{ $data->id }}'> 
                  {{ $data->start_date }}
                </div> 
            </td>
             <td> 
                <div contentEditable='true' class='edit' id='job_title.{{ $data->id }}'> 
                  {{ $data->job_title }}
                </div> 
            </td>
             <td> 
                <div contentEditable='true' class='edit' id='work.address_{{ $data->id }}'> 
                  {{ $data->work_address }}
                </div> 
            </td>
             <td> 
                <div contentEditable='true' class='edit' id='gender.{{ $data->id }}'> 
                  {{ $data->gender }}
                </div> 
            </td>
        
        </tr>
        @endforeach 
        
    </table>
    </div>
  </div>
</div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){
 
 // Add Class
 $('.edit').click(function(){
  $(this).addClass('editMode');
 });

 // Save data
 $(".edit").focusout(function(){
  $(this).removeClass("editMode");
  var id = this.id;
  var split_id = id.split(".");
  var field_name = split_id[0];
  var edit_id = split_id[1];
  var value = $(this).text();
 var _token= '<?php echo csrf_token() ?>';
  $.ajax({
   url:"{!! url('save_youth_data') !!}",
   type: 'post',
   data: { field:field_name, value:value, id:edit_id ,_token:_token},
   success:function(response){
    console.log('Save successfully'); 
   }
  });
 
 });

});
</script>
@endsection