<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model {
	protected $table = "customer";
	public $timetamp = false;

	public function users() {
		return $this->belongsTo('App\Users', 'user_id', 'id');
	}
	public function show() {
		return $this->paginate(5);
	}
	public function getbyId($id) {
		return $this->find($id);
	}
	public function add($req) {
		$this->user_id = $req->user_id;
		$this->phone = $req->phone;
		$this->name = $req->fullname;
		$this->email = $req->email;
		$this->address = $req->address;
		$this->save();
	}
	public function del($id) {
		$company = $this->getbyId($id);
		$company->delete();
	}
}
