<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = "bill";
	public $timetamp = false;

    public function tour(){
		return $this->belongsTo('App\Tour', 'tour_id', 'id');
	}
}
