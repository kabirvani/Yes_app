<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use Illuminate\Support\Facades\DB;
use App\Youth;

class YouthController extends Controller
{
    public function index(){
        $data = DB::table('youths')->get();
        return view('home_page_layouts.youth_uploader')->with('data', $data);
    }

    public function importExcel(Request $request){
        $path = $request->file('import_file')->getRealPath();
        $data = Excel::load($path)->get();
        if($data->count()){
            foreach ($data as $key => $value) {
                $arr[] = ['title' => $value->title, 'job_title' => $value->job_title,'first_name' => $value->first_name,'last_name' => $value->last_name,'mobile' => $value->mobile,'start_date' => $value->start_date,'work_address' => $value->work_address,'contact_signed' => $value->contact_signed,'id_number' => $value->id_number,'gender' => $value->gender];
            }
 
            if(!empty($arr)){
                Youth::insert($arr);
            }
           return redirect('youth_uploader');
   }
}

public function save_youth_data(){
    $field = $_POST['field'];
    $value = $_POST['value'];
    $editid = $_POST['id'];
   
      
DB::table('youths')->where('id',$editid)->update(array($field => $value));
    return response()->json(['status'=>'yes']);
}

}
    


