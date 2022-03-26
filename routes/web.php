<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Http;
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
Route::get('/weather', function () { 
    $apikey = config('services.weather.key');
    $country=request('country');
    $city=request('city');
    $response =Http::get("http://api.openweathermap.org/data/2.5/weather?q=$city,$country&APPID=$apikey");
    return $response->json();
});

Route::get('/placeInfo', function () { 
    $apikey = config('services.place.key');
    $country=request('country');
    $city=request('city');

    $response =Http::withHeaders([
        'Accept'=> 'application/json',
        'Authorization'=> $apikey
    ])->get("https://api.foursquare.com/v3/places/search?near=$city,$country&amp;limit=5&amp;categoryId=$apikey");
    
    $return= $response->json()['results'];
    $newReturn=[];
    foreach($return as $key=>$value)
    {
        $fsq_id= $value['fsq_id'];
        $newReturn[$key]['name']=$value['name'];
        $newReturn[$key]['formatted_address']=$value['location']['formatted_address'];
          
        $response2 =Http::withHeaders([
            'Accept'=> 'application/json',
            'Authorization'=> $apikey
        ])->get("https://api.foursquare.com/v3/places/$fsq_id/photos?limit=5&sort=POPULAR");
        $newReturn[$key]['img']=[];
        foreach($response2->json() as $key1=>$value1)
        {
            $newReturn[$key]['img'][$key1]=$value1['prefix']."original".$value1['suffix'];
        }
    }
    return $newReturn;
});

