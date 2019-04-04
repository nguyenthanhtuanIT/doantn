<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    public $table = 'detail';
    protected $timetamp = false;

    public function tour()
    {
    	return $this->belongsTo('App\Tour','tour_id','id');
    }
}
