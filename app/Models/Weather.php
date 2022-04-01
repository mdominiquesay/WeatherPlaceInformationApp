<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    use HasFactory;
    private $icon;
    private $temp;
    private $description;
    private $date;
    public function setIcon($icon){$this->icon=$icon;}  
    public function getImage(){
        return "http://openweathermap.org/img/w/" . $this->icon.".png";
    }
    public function setTemp($temp){$this->temp=$temp;}
    public function getTemp(){return $this->temp;}

    public function setDate($date){$this->date=$date;}
    public function getDate(){return $this->date;}

    public function setDescription($description){$this->description=$description;}
    public function getDescription(){return $this->description;}
}
