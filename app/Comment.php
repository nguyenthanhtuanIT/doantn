<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {
	protected $table = "comment";
	public $timetamp = false;

	public function users() {
		return $this->belongsTo('App\Users', 'user_id', 'id');
	}
	public function tour() {
		return $this->belongsTo('App\Tour', 'tour_id', 'id');
	}
	public function show() {
		$comment = $this->paginate(10);
		return $comment;
	}
	public function add($req) {
		$this->user_id = $req->user_id;
		$this->tour_id = $req->tour_id;
		$this->content = $req->content;
		$this->KT = $req->check;
		$this->save();
	}
	public function getCommentbyId($id) {
		$comm = $this->find($id);
		return $comm;
	}
	public function editComment($req, $id) {
		$com = $this->getCommentbyId($id);
		$com->add($req);
	}
	public function del($id) {
		$com = $this->getCommentbyId($id);
		$com->delete();
	}
	public function postcomment($id, $iduser, $content) {
		$this->tour_id = $id;
		$this->user_id = $iduser;
		$this->content = $content;
		$this->KT = 1;
		$this->save();
	}

}
