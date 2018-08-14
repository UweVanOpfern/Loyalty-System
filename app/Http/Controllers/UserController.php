<?php

namespace App\Http\Controllers;

use App\Transactions;
use Illuminate\Http\Request;
use Session;
use App\Classes\RetreiveUserInfo;
use App\Classes\CalculateMerchantPoints;
use App\Classes\ConsumePoints;
use Log;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Calculations of the points
        $cal = new CalculateMerchantPoints();

        $take = $cal->calculatePoints();

        $total_points     = Session::get('total');
        
        $userID     = Session::get('users');

        //Retreive user informations

        $userData = new  RetreiveUserInfo();

        $accessData = $userData->getUserData();
        
        $json     = Session::get('json');

        // return view('user');
        return view('user', ['json' => json_decode($json, true),'total'=>$total_points,'user_id'=>$id,'user'=>$userID]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function delete()
    {
        $objConsume = new ConsumePoints();
        $take_point_away = $objConsume->consumeUserPoint();

        // $cal = new CalculateMerchantPoints();

        // $take = $cal->calculatePoints();

        // $total_points   = Session::get('total');

        // $initial_points = 10;

        // $consume = $total_points - $initial_points;

        return back()->withInput()->with('success','Some points consumed with success');

        // return view('home', ['remain'=>$consume]);   
    }
}
