<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {
	protected $table = 'role';
	public $timetamp = false;

	public function users() {
		return $this->hasMany('App\Users', 'role_id', 'id');
	}
	public function show() {
		return $this->paginate(5);
	}
	public function getbyId($id) {
		return $this->find($id);
	}
	public function add($req) {
		$this->name = $res->name;
		$this->description = $res->description;
		$this->save();
	}
	public function del($id) {
		$del = $this->getbyId($id);
		$del->delete();
	}
}
