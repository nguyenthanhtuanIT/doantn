<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model {
	protected $table = 'tour';
	public $timetamp = false;

	public function tag() {
		return $this->belongsTo('App\Tag', 'tag_id', 'id');
	}
	public function company() {
		return $this->belongsTo('App\Company', 'company_id', 'id');
	}
	public function image() {
		return $this->hasMany('App\Image', 'tour_id', 'id');
	}
	public function comment() {
		return $this->hasMany('App\Comment', 'tour_id', 'id');
	}
	public function bill() {
		return $this->hasMany('App\Bill', 'tour_id', 'id');
	}
	public function detail() {
		return $this->hasOne('App\Detail', 'tour_id', 'id');
	}
	public function show() {
		return $this->paginate(10);
	}
	public function getbyId($id) {
		return $this->find($id);
	}
	public function add($req) {
		$this->company_id = $req->company_id;
		$this->tag_id = $req->tag_id;
		$this->title = $req->title;
		$this->route = $req->route;
		$this->mean = $req->mean;
		$this->time_start = $req->time_start;
		$this->time_end = $req->time_end;
		$this->amount = $req->amount;
		$this->status = $req->status;
		$this->description = $req->description;
		$this->price = $req->price;
		$this->save();
	}
	public function del($id) {
		$del = $this->getbyId($id);
		$del->delete();
	}
}
