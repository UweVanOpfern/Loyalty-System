<?php

namespace App\Classes;
use Session;

class RetreiveUserInfo{

    public function getUserData(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_PORT => "8001",
        CURLOPT_URL => "http://localhost:8001/api/userinfo",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache",
            "postman-token: 442a9c77-56ae-78a8-dc96-c2d5a848b0d4"
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) 
        {
        echo "cURL Error #:" . $err;

        } else {
       
            
            
            Session::put('json',$response);
            
        }
    }
}