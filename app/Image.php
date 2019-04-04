<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model {
	protected $table = 'image';
	public $timetamp = false;

	public function tour() {
		return $this->belongsTo('App\Tour', 'tour_id', 'id');
	}
	public function location() {
		return $this->belongsTo('App\Location', 'image_id', 'id');
	}
	public function getbyId($id) {
		return $this->find($id);
	}
	public function show() {
		return $this->paginate(5);
	}
	public function add($req) {
		$this->tour_id = $req->tour_id;
		$this->img = $req->image;
		if ($req->hasFile('nameimg')) {
			$file = $req->file('nameimg');
			$duoi = $file->getClientOriginalExtension();
			if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg') {
				return redirect('admin/image/add')->with('err', 'Chỉ được chọn file có đuôi jpg, png, jpeg');
			}
			$name = $file->getClientOriginalName();
			$file->move('upload', $name);
			$this->name = $name;
		}
		$this->save();
	}
	public function del($id) {
		$img = $this->getbyId($id);
		$img->delete();
	}
}
