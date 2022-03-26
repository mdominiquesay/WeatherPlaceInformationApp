<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Places;

class PlacesController extends Controller
{
    
    public function requestPlace($city,$country)
    {
        $apikey = config('services.place.key');
        $url="https://api.foursquare.com/v3/places/search?";
        $limit=5;
        $response =Http::withHeaders([
            'Accept'=> 'application/json',
            'Authorization'=> $apikey
        ])->get($url."near=$city,$country&amp;limit=$limit&amp;categoryId=$apikey");
        $return= $response->json()['results'];
        $newReturn=[];
        
        foreach($return as $key=>$value)
        {
            $place=new Places();

            $place->setName($value['name']);
            $place->setFormatted_address($value['location']['formatted_address']);
            $img=ImageController::fetchImage($value['fsq_id']);
            $place->setImage($img);

            $newReturn[$key]=$place->getData();
            
        }
        return $newReturn;
    }
}
