<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model {
	public $table = 'detail';
	protected $timetamp = false;

	public function tour() {
		return $this->belongsTo('App\Tour', 'tour_id', 'id');
	}
	public function show() {
		return $this->paginate(1);
	}
	public function getdetailbyId($id) {
		return $this->find($id);
	}
	public function add($req) {
		$this->tour_id = $req->tour_id;
		$this->detail = $req->detail;
		$this->save();
	}
	public function del($id) {
		$del = $this->getdetailbyId($id);
		$del->delete();
	}
}
