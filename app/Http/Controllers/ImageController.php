<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Image;

class ImageController extends Controller
{
    
    public function fetchImage($fsq_id)
    {
        $url="https://api.foursquare.com/v3/places/";
        $limit=5;
        $sort="POPULAR";
        $apikey = config('services.place.key');
        $return=[];
        
        $response =Http::withHeaders([
            'Accept'=> 'application/json',
            'Authorization'=> $apikey
        ])->get($url.$fsq_id."/photos?limit=".$limit."&sort".$sort);
        
        foreach($response->json() as $key=>$value)
        {
            $image=new Image();
            $image->setPrefix($value['prefix']);
            $image->setSuffix($value['suffix']);

            $return[$key]=$image->getImg();
        }
        return $return;
    }
}
