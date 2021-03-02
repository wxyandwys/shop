<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table="category";
    public $timestamps=false;
    public function classification(){
        return $this->hasMany('App\Models\Classification','category_id','category_id');
    }
}

