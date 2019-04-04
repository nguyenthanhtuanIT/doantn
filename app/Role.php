<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'role';
    public $timetamp = false;

    public function users()
    {
    	return $this->hasMany('App\Users', 'role_id', 'id');
    }
}
