<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\MailResetPasswordNotification;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
    ];

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function company_detail(){
        return $this->hasOne('App\CompanyDetails');
    }
    public function contact_detail(){
        return $this->hasOne('App\ContactDetails');
    }
    public function sendPasswordResetNotification($token)
    {
        // $this->notify(new MailResetPasswordNotification($token));

        $user['email'] = request()->email;
        $link = url( "/password/reset/" . $token .'/'.$user['email']);

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
                      "url": "'.$link.'",'.
                      '"year": "2019",
                      "profile_type": "company"
                   }
               }
            ],
            "template_id":"d-7329c5712fd64fe1875b089e226aa665"
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

        $data['user'] = $user;
        return redirect()->back()->withInput();
    }
}
