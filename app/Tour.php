<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $table = 'tour';
    public $timetamp = false;

    public function tag()
    {
    	return $this->belongsTo('App\Tag', 'tag_id', 'id');
    }
    public function company(){
		return $this->belongsTo('App\Company', 'company_id', 'id');
	}
	public function image(){
		return $this->hasMany('App\Image', 'tour_id', 'id');
	}
	public function comment(){
		return $this->hasMany('App\Comment', 'tour_id', 'id');
	}
	public function bill(){
		return $this->hasMany('App\Bill', 'tour_id', 'id');
	}
	public function detail()
	{
		return $this->hasOne('App\Detail', 'tour_id', 'id');		
	}
}
