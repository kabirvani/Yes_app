<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\WorkExperience;

class InHouseAssistedController extends Controller
{
    public function index(Request $request){
        $user['per_year'] = "7,000";
        $data['user'] = $user;
        return view('home_page_layouts.inhouseassisted_confirm', $data);
    }
    public function checkout(Request $request){
        $email = $request->input('email');
        $name = $request->input('name');
        $per_youth = $request->input('per_youth');
        $youth = $request->input('youth');
        $excluding_vat = $request->input('excluding_vat');

        $work_exp = new WorkExperience;
        $work_exp->email = $email;
        $work_exp->name = $name;
        $work_exp->youth_num = $youth;
        $work_exp->excluding_vat = $excluding_vat;
        $work_exp->exp_type = 2;
        $work_exp->save();

        $user['email'] = $email;
        $user['per_youth'] = number_format($per_youth);
        $user['youth'] = number_format($youth);
        $user['excluding_vat'] = number_format($excluding_vat);
        $data['user'] = $user;
        return view('home_page_layouts.inhouseassisted_checkout', $data);
    }
}
