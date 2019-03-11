<?php

namespace App\Http\Controllers;

use App\Mail\SendMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Sichikawa\LaravelSendgridDriver\SendGrid;
use App\Mail\EmailAlreadyExists;
use App\User;

class SendMailController extends Controller
{
    //
    use SendGrid;
    public function sendVerifyCode(Request $request){

        $users = User::where('email', $request->input('email')) -> first();
        $user['email'] = $request->input('email');
        $six_digit_random_number = mt_rand(100000, 999999);

        $sendgrid_api_key = env('SENDGRID_API_KEY');
        $from_addres = env('MAIL_FROM_ADDRESS');
        $from_name = env('MAIL_FROM_NAME');


        if ( $users == NULL)
        {
            $ch = curl_init();
            $code = substr_replace($six_digit_random_number, '-', 3, 0);
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
                         "code": "'.$code.'",'.
                         '"year": "2019",
                         "profile_type": "company"
                       }
                   }
                ],
                "template_id":"d-6dc525145b484620a240606b6fd9a810"
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
        }
        else
        {
            $passwordResetUrl = url( "/password/reset/");
            $user_email = $request->input('email');
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
                            "email":"'.$user_email.'"'.
                         '}
                      ],
                      "dynamic_template_data":{
                         "email": "'.$user_email.'",'.
                         '"passwordResetUrl":"'.$passwordResetUrl.'",'.
                         '"year": "2019",
                         "profile_type": "company"
                       }
                   }
                ],
                "template_id":"d-40c21a9797de43e38e3318fe88ae0dbb"
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
            
        }
        $user['six_digit_random_number'] = $six_digit_random_number;
        $user['verifyCode'] = 2;
        $user['duplicate'] = 0;
        $data['user'] = $user;
        return view('auth/register', $data);
    }
}