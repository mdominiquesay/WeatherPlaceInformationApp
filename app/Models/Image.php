<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    private $prefix='';
    private $suffix='';
    public function setPrefix($prefix){$this->prefix=$prefix;}
    public function setSuffix($suffix){$this->suffix=$suffix;}
    public function getImg(){ 
        return $this->prefix."original".$this->suffix;
    }
}
