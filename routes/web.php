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
