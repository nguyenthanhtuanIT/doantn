<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model {
	protected $table = "users";
	public $timetamp = false;

	public function role() {
		return $this->belongsTo('App\Role', 'role_id', 'id');
	}
	public function company() {
		return $this->hasOne('App\Company', 'user_id', 'id');
	}
	public function customer() {
		return $this->hasOne('App\Customer', 'user_id', 'id');
	}
	public function comment() {
		return $this->hasMany('App\Comment', 'user_id', 'id');
	}
	public function show() {
		return $this->paginate(5);
	}
	public function getbyId($id) {
		return $this->find($id);
	}
	public function add($req) {
		$this->role_id = $req->role_id;
		$this->username = $req->username;
		$this->password = bcrypt($req->password);
		$this->save();
	}
	public function del($id) {
		$us = $this->getbyId($id);
		$us->delete();
	}
}
