<?php

namespace App\Classes;
use Session;

class ConsumePoints{

    public function consumeUserPoint(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_PORT => "8001",
        CURLOPT_URL => "http://localhost:8001/api/delete",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "DELETE",
        CURLOPT_HTTPHEADER => array(
            "accept: application/json",
            "cache-control: no-cache",
            "content-type: application/json",
        ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            $sms = "cURL Error #:" . $err;
        } 
        else {

            $sms = $response;
        }
    }
}