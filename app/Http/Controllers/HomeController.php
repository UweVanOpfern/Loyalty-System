<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\RetreiveUserCredentials;
use Illuminate\Support\Facades\DB;
use App\Transactions;
use Session;
use App\Classes\RetreiveUserInfo;
use App\Classes\CalculateMerchantPoints;
use App\Classes\ConsumePoints;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $cal = new CalculateMerchantPoints();

        $take = $cal->calculatePoints();

        $total_points     = Session::get('total');

        $userData = new  RetreiveUserInfo();

        $accessData = $userData->getUserData();
        
        $json     = Session::get('json');

        // return view('user');
        return view('home', ['json' => json_decode($json, true),'total'=>$total_points]);
    }
    

    // public function dumpAll()
    // {

    //     $dump_all = Transactions::truncate();

    //     if($dump_all){

    //         return back()->withInput()->with('success','All data dumped with success');
    //     }
    // }
}
