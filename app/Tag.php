<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {
	protected $table = 'tag';
	public $timetamp = false;

	public function tour() {
		return $this->hasMany('App\Tour', 'id_tag', 'id');
	}
	public function show() {
		return $this->paginate(5);
	}
	public function getbyId($id) {
		return $this->find($id);
	}
	public function add($req) {
		$this->title = $req->title;
		$this->save();
	}
	public function del($id) {
		$del = $this->getbyId($id);
		$del->delete();
	}
}
