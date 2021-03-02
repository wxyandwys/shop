<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classification extends Model
{
    protected $table="classification";
    public $timestamps=false;
    public function shop(){
        return $this->hasMany('App\Models\Shop','classification_id','classification_id');
    }
}
