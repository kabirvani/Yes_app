<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Sichikawa\LaravelSendgridDriver\SendGrid;
use App\Mail\UserEmailVerification;

class SignUpProcessController extends Controller
{
    //
    public function checkVerifyCode(Request $request){
        $user['email'] = $request->input('email');

        $six_digit_random_number = $request->input('six_digit_random_number');
        $user['six_digit_random_number'] = $six_digit_random_number;

        $firstDigit = $request->input('first_digit');
        $second_digit = $request->input('second_digit');
        $third_digit = $request->input('third_digit');
        $fouth_digit = $request->input('fouth_digit');
        $fifth_digit = $request->input('fifth_digit');
        $sixth_digit = $request->input('sixth_digit');
        
        $digit_num = $firstDigit.$second_digit.$third_digit.$fouth_digit.$fifth_digit.$sixth_digit;

        if($digit_num == $six_digit_random_number)
            $user['verifyCode'] = 1;
        else
            $user['verifyCode'] = 0;
        $data['user'] = $user;
        return view('auth/register', $data);
    }
    public function companyName(Request $request){
        $user['email'] = $request->input('email');
        $user['name'] = $request->input('name');
        $user['verifyCode'] = 1;
        $data['user'] = $user;
        return view('auth/register', $data);
    }

    use SendGrid;
    public function createPassword(Request $request){
        $user['email'] = $request->input('email');
        $user['name'] = $request->input('name');
        $user['password'] = $request->input('password');
        $user['password_confirmation'] = $request->input('password_confirmation');
        $user['verifyCode'] = 1;
        $data['user'] = $user;


        $login_url = "portal.dev.yes4youth.co.za";

        $sendgrid_api_key = env('SENDGRID_API_KEY');
        $from_addres = env('MAIL_FROM_ADDRESS');
        $from_name = env('MAIL_FROM_NAME');

        $ch = curl_init();

        $vars = '{
            "from":{
                "email":"'.$from_addres.'",'.
                '"name":"'.$from_name.'"'.
            '},
            "personalizations":[
               {
                  "to":[
                     {
                        "email":"'.$user['email'].'"'.
                     '}
                  ],
                  "dynamic_template_data":{
                      "email":"'.$user['email'].'",'.
                      '"url": "'.$login_url.'",'.
                      '"year": "2019",
                      "profile_type": "company"
                   }
               }
            ],
            "template_id":"d-efa448ce234b408398915201a5f27856"
         }';
        curl_setopt($ch, CURLOPT_URL,"https://api.sendgrid.com/v3/mail/send");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$vars);  //Post Fields
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $headers = [
            'Authorization: Bearer '.$sendgrid_api_key,
            'Content-Type: application/json',
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $server_output = curl_exec ($ch);

        curl_close ($ch);

        return view('auth/register', $data);
    }
}
