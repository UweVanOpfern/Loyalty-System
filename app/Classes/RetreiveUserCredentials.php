<?php

namespace App\Classes;
use Session;

class RetreiveUserCredentials{

    public function MurugoResponse(){

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://178.128.179.51/api/user",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 120,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(
                "accept: application/json",
                "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjljMzcyODI5NjY0ZWY3ZjM4MzVmMTg4Y2M4NzI3NDI0YWI1N2MyZjAyMmJmOThjYWMwMDEzMjk2MDExZjcyMDNhM2M1ZTk1MDRhMzYxNDdlIn0.eyJhdWQiOiI1IiwianRpIjoiOWMzNzI4Mjk2NjRlZjdmMzgzNWYxODhjYzg3Mjc0MjRhYjU3YzJmMDIyYmY5OGNhYzAwMTMyOTYwMTFmNzIwM2EzYzVlOTUwNGEzNjE0N2UiLCJpYXQiOjE1MzQxNTY0NjMsIm5iZiI6MTUzNDE1NjQ2MywiZXhwIjoxNTY1NjkyNDYzLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.A-WDGq2bwNdZ7tm3n0ZGRkb6clbOeVhUpMANcICFv0Vukv-dHn7wCUMN0JnIx4V9nUfwq_jic5Yk1GNgAvT8hpwRlGrxiGizjawtXZ21-nlxP9usTNdkiNfhUDbO-YS4NRg4CFZ0SbeMUrgZWAFMG5ZAivucwKSKAQcj81JBCsuJppwoEIudi1ZWlGcYfvRxKF6jXOJ8UXvt53dNnnl5prZgJmzaStJ3UTPcgXG0FrZDN2IHSmFSqnhSpFBMK6S19zUWgPkRR-EsYFYWVvCYvFsZvXPcijvA2XNjeV7ZECcsOXmScgFFfFrMyLB1hr1S-ljlYHXD9LkEiYOKHmt3BsoeF9429LdElNzR0aj9_1TRIldUgH8Gjw07gklYxACZFpYzzkpNNQpeJ2XAyef0Zp7Vahk0z33fnBBOv_SZ_n_SsRyw-4Gmb1h99WeCDv5mUyci5DZdRhiQrQmKqqzE1wLPlYjuL3g_Okl5vNkseJMVa2bKFjPZB7Fh0i4jDtTfMi6iSUhksfgb89mNuk-mVL3ZnyvttyPtVeSbTOP1gmwXEwUZ2nCUt8sbKk-F2A-x9-6-d1lZeAswJEGnHU6MVBKd0CkrDmrbW-ZJcwlx9kdv9uy8TyhsTXxpxsMtl5nrsV8y6aY1nEsehWJlD6UF7QfLNpIRHnjxTNU7v7JDcsg",
            ),
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {

            echo "cURL Error #:" . $err;

        }

        else {
      
            $json = json_decode($response, true);
            // $name = $json['name'];
            $email = $json['email'];
            $created_at = $json['created_at'];
            $updated_at = $json['updated_at'];

            // Session::put('name',$name);
            Session::put('email',$email);
            Session::put('created_at',$created_at);
            Session::put('updated_at',$updated_at);
        }
    }
}

