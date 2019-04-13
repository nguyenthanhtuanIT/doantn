<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class Tagcontroller extends Controller {
	public function getTag() {
		$t = new Tag;
		$tag = $t->show();
		return view('admin.tag.danhsach', ['tag' => $tag]);
	}
	public function getAddtag() {
		return view('admin.tag.them');
	}
	public function postAddtag(Request $req) {
		$tag = new Tag;
		$tag->add($req);
		return redirect('admin/tag/add')->with('thongbao', 'successfully');
	}
	public function getUpdatetag($id) {
		$t = new Tag;
		$tag = $t->getbyId($id);
		return view('admin.tag.sua', ['tag' => $tag]);
	}
	public function postUpdatetag(Request $req, $id) {
		$t = new Tag;
		$tag = $t->getbyId($id);
		$tag->add($req);
		return redirect('admin/tag/update/' . $id)->with('thongbao', 'successfully');
	}
	public function deleteTag($id) {
		$tag = new Tag;
		$tag->del($id);
		return redirect('admin/tag/list')->with('thongbao', "Deleted");
	}
}
