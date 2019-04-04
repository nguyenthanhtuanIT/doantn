<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model {
	protected $table = 'company';
	public $timetamp = false;

	public function tour() {
		return $this->hasMany('App\Tour', 'tour_id', 'id');
	}
	public function users() {
		return $this->belongsTo('App\users', 'user_id', 'id');
	}
	public function getbyId($id) {
		return $this->find($id);
	}
	public function show() {
		$company = $this->paginate(5);
		return $company;
	}
	public function add($req) {
		$this->user_id = $req->user_id;
		$this->phone = $req->phone;
		$this->name = $req->name;
		$this->email = $req->email;
		$this->address = $req->address;
		$this->save();
	}
	public function del($id) {
		$del = $this->getbyId($id);
		$del->delete();
	}
}
