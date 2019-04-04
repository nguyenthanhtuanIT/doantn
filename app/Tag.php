<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tag';
    public $timetamp = false;

    public function tour()
    {
        return $this->hasMany('App\Tour', 'id_tag', 'id');
    }
}
