<?php

namespace App\Classes;
use Session;
use App\Classes\RetreiveUserInfo;

class CalculateMerchantPoints{

    public function calculatePoints(){

        $userData = new  RetreiveUserInfo();

        $accessData = $userData->getUserData();
        
        $json     = Session::get('json');

        $result = json_decode($json, true);

        $total_oops = 0;
        $total_neo = 0;
        $total_abdoul = 0;

        foreach($result['data'] as $data){
            // echo $data['price'];
            $data['name'];

            if($data['name'] == "Cafe Neo"){

                $point_round_neo = $data['price'] * 0.1;

                $total_neo += $point_round_neo;

            }elseif($data['name'] == "Abdoul Market"){

                $point_round_abdoul = $data['price'] * 0.2;

                $total_abdoul += $point_round_abdoul;

            }else{
                
                $point_round_other = $data['points'];

                $total_oops += $point_round_other;

            }
        }
        
        $total_points = $total_oops + $total_abdoul + $total_neo;

        $total_points;

        Session::put('total',$total_points);
    }
}