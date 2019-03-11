<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetGeoIPLocationController extends Controller
{
    //
    public function getCountry(){
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,"https://ipinfo.io?token=7c91f741397c93");
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $headers = [
            'Authorization: Bearer 7c91f741397c93'
        ];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $server_output = curl_exec ($ch);
        curl_close ($ch);

        return $server_output;
    }
}
