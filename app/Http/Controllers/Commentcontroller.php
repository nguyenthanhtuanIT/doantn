<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

class Commentcontroller extends Controller {
	public function getComment() {
		$com = new Comment;
		$comment = $com->show();
		return view('admin.comment.danhsach', ['comment' => $comment]);
	}
	public function getAddcomment() {
		return view('admin.comment.them');
	}
	public function postAddcomment(Request $req) {
		$com = new Comment;
		$com->add($req);
		return redirect('admin/comment/add')->with('thongbao', 'successfully');
	}
	public function getUpdatecomment($id) {
		$comm = new Comment;
		$comment = $comm->getCommentbyId($id);
		return view('admin.comment.sua', ['comment' => $comment]);
	}
	public function postUpdatecomment(Request $req, $id) {
		$com = new Comment;
		$comment = $com->editComment($req, $id);
		return redirect('admin/comment/update/' . $id)->with('thongbao', 'successfully');
	}
	public function deleteComment($id) {
		$com = new Comment;
		$comment = $com->del($id);
		return redirect('admin/comment/list')->with('thongbao',
			"Deleted comment have id = $comment->id");
	}
	public function postComment(Request $req, $id, $iduser) {
		$com = new Comment;
		$comment = Comment::where('tour_id', $id)->get();
		$com->postComment($req, $id, $iduser);
		return view('pages.commentajax', compact('comment'));
	}
	public function delComment($id) {
		$comment = Comment::find($id);
		$comment->delete();
		return redirect('blog/' . $comment->tour_id);
	}
}
