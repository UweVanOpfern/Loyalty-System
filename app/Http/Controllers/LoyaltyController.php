<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class LoyaltyController extends Controller
{
    public function generatePoints(){

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
					"authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImU4MWYwOGU1Y2M3NTkwNTAxYjQ4MDI2YzhlMWEyZDJlZDk3MTkwYjQyODFlNDM0NWFhNjkwMzU1ZmEzOTA2NWY1YTA3MDljMWFkZWNhNWE3In0.eyJhdWQiOiI1IiwianRpIjoiZTgxZjA4ZTVjYzc1OTA1MDFiNDgwMjZjOGUxYTJkMmVkOTcxOTBiNDI4MWU0MzQ1YWE2OTAzNTVmYTM5MDY1ZjVhMDcwOWMxYWRlY2E1YTciLCJpYXQiOjE1MzM3NjQyMjMsIm5iZiI6MTUzMzc2NDIyMywiZXhwIjoxNTY1MzAwMjIzLCJzdWIiOiI1Iiwic2NvcGVzIjpbXX0.RMtiKCgb3gqy28q7pERlGg_f1YV323Fv-vjxQlKLsUOzmwMe2CEDnvzQ4wsB6LY1tRztanZ29VUadV0zSyqoghRCRhKLzgMKkLP2LKE9P3EcIC1m7rt7mTVlvDHWdFmDxUqQ3iD_RxQrK4buIw_f0JQP2qi2iYbdtGk9RqCGntgUwzcy6ICeXLDlMdT3FGjHWEYgrtVvdB-T2v9Dks-FXbx8E_bdXVhxXcADD2vVSO2F3k0Us10HbW5wTpQV_4kN6WnNbDrEaeuctGcqeSUqkwT0fX3W2so6P5Ph0i6cp6Pd3dUFAtrKQ5eTGwDqTKN609RNTSjFBp8KRIuDp_Enjl8oMzUS3pYJz-nDnI_UY7ydC6dWYzJ5ar7sNGQCv-NccWSnVUQHi8cQoPiL8yJ8AhUqnT63YyvcFauBhUELKOI5sHNVD95xY-h-MAQH9Brm0cSVcqXLH5h9OZ5WOz0nNDTgnm12ueSAaMyTRMaJol4m0zIr-dvQfSah1JClhF4zWBghqpVp-qQkoGqBIJ18jKQ2oJg87oTOyApVx0vTdn8827r60soPbtkWpHFNf_r2NKblsz9WKh4aVOgmr5OkOEDEkvQfrUf_rolitAlvcI3gE9n8YrAQ8iPcU5c0XODFQDFwH_RrKBKmn2tiwfeTDbivPbe4WNiriWEQZFyPwmE",
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

				$name = $json['name'];
				$email = $json['email'];
				$created_at = $json['created_at'];
				$updated_at = $json['updated_at'];

				return view('generate', ['email' => $email, 'created_at' =>$created_at, 'name' =>$name, 'updated_at' =>$updated_at]);
				
			}
    }
}
