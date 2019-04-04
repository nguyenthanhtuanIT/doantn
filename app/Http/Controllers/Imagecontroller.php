<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;

class Imagecontroller extends Controller {
	public function getImage() {
		$img = new Image;
		$image = $img->show();
		return view('admin.image.danhsach', ['image' => $image]);
	}
	public function getAddimage() {
		return view('admin.image.them');
	}
	public function postAddimage(Request $req) {
		$img = new Image;
		$image = $img->add($req);
		return redirect('admin/image/add')->with('thongbao', 'successfully');
	}
	public function getUpdateimage($id) {
		$img = new Image;
		$image = $img->getbyId($id);
		return view('admin.image.sua', ['image' => $image]);
	}
	public function postUpdateimage(Request $req, $id) {
		$img = new Image;
		$up = $img->getbyId($id);
		$up->add($req);
		return redirect('admin/image/update/' . $id)->with('thongbao', 'successfully');
	}
	public function deleteImage($id) {
		$image = new Image;
		$image->del($id);
		return redirect('admin/image/list')->with('thongbao',
			"Deleted image");
	}
}
