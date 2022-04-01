<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Places extends Model
{
    use HasFactory;
    private $name="";
    private $formatted_address="";
    private $image=[];
    private $fsq_id='';
    
    public function setFsq_id($fsq_id){$this->fsq_id=$fsq_id;}
    public function setName($name){$this->name=$name;}
    public function setFormatted_address($formatted_address){$this->formatted_address=$formatted_address;}
    public function setImage($image){$this->image=$image;}
    
    public function getName(){return $this->name;}
    public function getImage(){return $this->image;}
    public function getFormatted_address(){ return $this->formatted_address;}
    public function getData(){ 

        $return['name']=$this->name;
        $return['formatted_address']=$this->formatted_address;
        $return['img']=$this->image ;
        
        return  $return;
    }
    
}
