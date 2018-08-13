<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Classes\RetreiveUserCredentials;
use Log;
use Session;

class LoyaltyController extends Controller
{
	
    public function generatePoints(){

		$userCredentials = new  RetreiveUserCredentials();

		$accessResponse = $userCredentials->MurugoResponse();

		$name = Session::get('name');
		$email = Session::get('email');
		$created_at = Session::get('created_at');
		$updated_at = Session::get('updated_at');

		
		return view('generate', ['email' => $email, 'created_at' =>$created_at, 'name' =>$name, 'updated_at' =>$updated_at]);

    }
}
