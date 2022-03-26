<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Weather;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function requestWeather($city,$country)
    {
        $apikey = config('services.weather.key');
        $url="http://api.openweathermap.org/data/2.5/forecast?";
        $limit=7;
        $response =Http::withHeaders([
            'Accept'=> 'application/json',
            'Authorization'=> $apikey
        ])->get($url."q=$city,$country&appid=$apikey");
        $return= $response->json();
        $forcast=[];
        if($return['list'])
        {
            foreach($return['list'] as $key=>$value_day)
            {
                if(count($forcast)<$limit)
                {
                $data_forecast=new Weather();
                $data_forecast->setIcon($value_day['weather'][0]['icon']);
                $data_forecast->setTemp($value_day['main']['temp']);
                $data_forecast->setDescription($value_day['weather'][0]['main']);
                $date=date_format(date_create($value_day['dt_txt']),"D g:i A");

                $forcast[]=array('date'=>$date,'icon'=>$data_forecast->getImage(),
                'description'=>$data_forecast->getDescription(),
                'temp'=>$data_forecast->getTemp());
                }
            }   
            
        }
        return $forcast;
    }
}
