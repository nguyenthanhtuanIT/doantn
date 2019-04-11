<?php

namespace App\Http\Controllers;

use App\Image;
use App\Location;
use Illuminate\Http\Request;

class Locationcontroller extends Controller {
	public function getLocation() {
		$loc = new Location;
		$location = $loc->show();
		return view('admin.location.danhsach', ['location' => $location]);
	}
	public function getAddlocation() {
		return view('admin.location.them');
	}
	public function postAddlocation(Request $req) {
		$location = new Location;
		$location->add($req);
		return redirect('admin/location/add')->with('thongbao', 'successfully');
	}
	public function getUpdatelocation($id) {
		$loc = new Location;
		$location = $loc->getbyId($id);
		return view('admin.location.sua', ['location' => $location]);
	}
	public function postUpdatelocation(Request $req, $id) {
		$loc = new Location;
		$lct = $loc->getbyId($id);
		$lct->add($req);
		return redirect('admin/location/update/' . $id)
			->with('thongbao', 'successfully');
	}
	public function deleteLocation($id) {
		$location = new Location;
		$location->del($id);
		return redirect('admin/location/list')->with('thongbao',
			"Deleted location");
	}
	//home location
	public function showLocation() {
		$location = Location::paginate(4);
		$image = Image::all();
		return view('pages.location', ['location' => $location, 'image' => $image]);
	}
	public function showDetaillocation($id) {
		$detail = Location::find($id);
		$image = Image::all();
		return view('pages.detaillocation', ['detail' => $detail, 'image' => $image]);
	}
}
