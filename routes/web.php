<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/redirect', function () {
    $query = http_build_query([
        'client_id' => '5',
        'redirect_uri' => 'http://localhost:8000/callback',
        'response_type' => 'code',
        'scope' => '',
    ]);

    return redirect('http://178.128.179.51/oauth/authorize?'.$query);
})->name('get.token');

Route::get('/callback', function (Request $request) {
    $http = new GuzzleHttp\Client;

    $response = $http->post('http://178.128.179.51/oauth/token', [
        'form_params' => [
            'grant_type' => 'authorization_code',
            'client_id' => '5',
            'client_secret' => 'aGwHJLkVPlvuXsb9PSZc3pg112310Ie0mUr953tf',
            'redirect_uri' => 'http://localhost:8000/callback',
            'code' => $request->code,
        ],
    ]);

    return json_decode((string) $response->getBody(), true);
});

Route::get('api','LoyaltyController@generatePoints');

Route::resource('user','TransactionController');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/home', 'HomeController@delete')->name('delete');

// Route::post('/home', 'HomeController@dumpAll')->name('dumpAll');

Route::post('murugo', 'LoginApiContoller@loginViaMurugo');

Route::get('murugo', function(){

    return view('murugo');
});
