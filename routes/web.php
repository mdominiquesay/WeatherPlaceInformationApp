<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PlacesController;
use App\Http\Controllers\WeatherController;
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
Route::get('/getWeather', function () {
    $country="Japan";
    $city=request('city');
    return view('welcome');
});
Route::get('/weather', function () { 
    $country=request('country');
    $city=request('city');
    $newReturn=WeatherController::requestWeather($city,$country);
    return $newReturn;
});

Route::get('/placeInfo', function () { 
    $country=request('country');
    $city=request('city');
    $newReturn=PlacesController::requestPlace($city,$country);
    return $newReturn;
});

