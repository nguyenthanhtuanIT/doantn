<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = "users";
	public $timetamp = false;

	public function role()
	{
		return $this->belongsTo('App\Role', 'role_id', 'id');
	}
	public function company()
	{
		return $this->hasOne('App\Company', 'user_id', 'id');
	}
	public function customer()
	{
		return $this->hasOne('App\Customer', 'user_id', 'id');
	}
	public function comment()
	{
		return $this->hasMany('App\Comment', 'user_id', 'id');
	}
}
