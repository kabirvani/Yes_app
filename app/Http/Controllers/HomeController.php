<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\WS_Curl_Class;
use Salaros\Vtiger\VTWSCLib\WSClient;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function test(){
        
        $client = new WSClient(env('serveraddress') . "/webservice.php", env('crm_username'), env('crm_useraccesskey'));
        $query= "SELECT * FROM Invoice;";
        $output = $client->runQuery($query);

        return $output;
    }

    public function index()
    {
        $email = Auth::user()->email;

        $user['result'] = DB::table('work_experiences')
                                    ->where('email', $email)
                                    ->get();
        $user['chart_info'] = DB::table('work_experiences')
                                    ->where('email', $email)
                                    ->groupBy(DB::raw("checkout_status, exp_type, DATE_FORMAT(created_at, '%Y-%m')"))
                                    ->selectRaw('*, DATE_FORMAT(created_at, "%m") as month, sum(youth_num) as sum')
                                    ->get();
        $user['company_details'] = DB::table('company_details')
                                    ->where('email', $email)
                                    ->get();
        
        $user['payment_approved'] = 0;
        $data['user'] = $user;
        return view('main', $data);
    }
}
