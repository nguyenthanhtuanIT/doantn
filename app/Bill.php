<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model {
	protected $table = "bill";
	public $timetamp = false;

	public function tour() {
		return $this->belongsTo('App\Tour', 'tour_id', 'id');
	}
	public function show() {
		return $this->paginate(5);
	}
	public function add($req) {
		$this->user_id = $req->user_id;
		$this->tour_id = $req->tour_id;
		$this->amount = $req->amount;
		$this->price = $req->price;
		$this->totalprice = $req->totalprice;
		$this->save();
	}
	public function getbillbyId($id) {
		return $this->find($id);
	}
	public function del($id) {
		$bill = $this->getbillbyId($id);
		$bill->delete();
	}
}
