<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model {
	protected $table = 'location';
	public $timetamp = false;

	public function image() {
		return $this->hasMany('App\Image', 'image_id', 'id');
	}
	public function show() {
		return $this->paginate(10);
	}
	public function getbyId($id) {
		return $this->find($id);
	}
	public function add($req) {
		$this->image_id = $req->image_id;
		$this->code = $req->code;
		$this->name = $req->name;
		$this->addreqs = $req->addreqs;
		$this->description = $req->description;
		$this->save();
	}
	public function del($id) {
		$del = $this->getbyId($id);
		$del->delete();
	}
}
