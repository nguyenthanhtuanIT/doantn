<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    public $timetamp = false;

    public function image()
    {
    	return $this->hasMany('App\Image', 'image_id', 'id');
    }
}
