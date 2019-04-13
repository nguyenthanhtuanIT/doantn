<?php

namespace App\Http\Controllers;

use App\Image;
use App\Tour;
use Illuminate\Http\Request;

class Tourcontroller extends Controller {
	public function getTour() {
		$slide = Image::where('img', 'slide')->get();
		$dstour = Tour::orderBy('id', 'DESC')->paginate(4);
		$image = Image::where('img', 'chude')->get();
		$tournb = Tour::where('tag_id', 2)->orderBy('id', 'DESC')->paginate(4);
		return view('index', [
			'dstour' => $dstour,
			'image' => $image,
			'slide' => $slide,
			'tournb' => $tournb,
		]);
	}
	public function getTouradmin() {
		$t = new Tour;
		$tour = $t->show();
		return view('admin.tour.danhsach', ['tour' => $tour]);
	}
	public function getAddtour() {
		return view('admin.tour.them');
	}
	public function postAddtour(Request $req) {
		$tour = new Tour;
		$tour->add($req);
		return redirect('admin/tour/add')->with('thongbao', 'successfully');
	}
	public function getUpdatetour($id) {
		$t = new Tour;
		$tour = $t->getbyId($id);
		return view('admin.tour.sua', ['tour' => $tour]);
	}
	public function postUpdatetour(Request $req, $id) {
		$t = new Tour;
		$tour = $t->getbyId($id);
		$tour->add($req);
		return redirect('admin/tour/update/' . $id)->with('thongbao', 'successfully');
	}
	public function deleteTour($id) {
		$tour = new Tour;
		$tour->del($id);
		return redirect('admin/tour/list')->with('thongbao',
			"Deleted tour");
	}
	public function Search(Request $req, $key) {

		$slide = Image::where('img', 'slide')->get();
		$dstour = Tour::where('title', 'like', "%$key%")->paginate(5);
		$image = Image::where('img', 'chude')->get();
		$tournb = Tour::where('tag_id', 2)->orderBy('id', 'DESC')->take(6)->get();
		return view('pages.search', [
			'dstour' => $dstour,
			'image' => $image,
			'slide' => $slide,
			'tournb' => $tournb,
			'key' => $key,
		]);
	}

}
