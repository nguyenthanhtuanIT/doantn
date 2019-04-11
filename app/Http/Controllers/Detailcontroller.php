<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Company;
use App\Detail;
use App\Image;
use Illuminate\Http\Request;

class Detailcontroller extends Controller {
	public function getDetail() {
		$de = new Detail;
		$detail = $de->show();
		return view('admin.detail.danhsach', ['detail' => $detail]);
	}
	public function getAdddetail() {
		return view('admin.detail.them');
	}
	public function postAdddetail(Request $req) {
		$detail = new Detail;
		$detail->add($req);
		return redirect('admin/detail/add')->with('thongbao', 'successfully');
	}
	public function getUpdatedetail($id) {
		$det = new Detail;
		$detail = $det->getdetailbyId($id);
		return view('admin.detail.sua', ['detail' => $detail]);
	}
	public function postUpdatedetail(Request $req, $id) {
		$det = new Detail;
		$detail = $det->getdetailbyId($id);
		$detail->add($req);
		return redirect('admin/detail/update/' . $id)->with('thongbao', 'successfully');
	}
	public function deleteDetail($id) {
		$det = new Detail;
		$det->del($id);
		return redirect('admin/detail/list')->with('thongbao',
			"Deleted detail");
	}
	//output detail tour
	public function showDetail($id) {
		$detail = Detail::where('tour_id', $id)->get();
		$image = Image::where('img', 'tour')->get();
		$company = Company::all();
		$comment = Comment::where(['KT' => 1, 'tour_id' => $id])->orderBy('id', 'DESC')->get();
		return view('pages.blog', compact('detail', 'image', 'company', 'comment'));
	}
}
