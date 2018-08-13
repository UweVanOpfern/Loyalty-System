<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classes\RetreiveUserCredentials;
use Illuminate\Support\Facades\DB;
use App\Transactions;
use Session;

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
        $userCredentials = new  RetreiveUserCredentials();

        $accessResponse = $userCredentials->MurugoResponse();
        
        $email = Session::get('email');

        $get_Data = Transactions::all();

        // $get_point = Transactions::where('points', 0)->sum('points');
        $get_point = DB::table('transactions')->sum('points');
        // $get_transactions = DB::table('transactions')->sum('id');

        

        return view('home', ['data' => $get_Data,'sum'=>$get_point]);
    }

    public function delete()
    {

        $consume_point = DB::table("transactions")->orderBy('id',"ASC")->take(1)->delete();

        if($consume_point){

            return back()->withInput()->with('success','10 points consumed with success');
        }
    }

    public function dumpAll()
    {

        $dump_all = Transactions::truncate();

        if($dump_all){

            return back()->withInput()->with('success','All data dumped with success');
        }
    }
}
