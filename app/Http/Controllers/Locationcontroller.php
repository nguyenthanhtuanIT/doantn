<?php

namespace App\Http\Controllers;

use App\Image;
use App\Location;
use Illuminate\Http\Request;

class Locationcontroller extends Controller {
	public function getLocation() {
		$location = Location::paginate(10);
		return view('admin.location.danhsach', ['location' => $location]);
	}
	public function getAddlocation() {
		return view('admin.location.them');
	}
	public function postAddlocation(Request $res) {
		$location = new Location;
		$location->image_id = $res->image_id;
		$location->code = $res->code;
		$location->name = $res->name;
		$location->address = $res->address;
		$location->description = $res->description;
		$location->save();
		return redirect('admin/location/add')->with('thongbao', 'successfully');
	}
	public function getUpdatelocation($id) {
		$location = Location::find($id);
		return view('admin.location.sua', ['location' => $location]);
	}
	public function postUpdatelocation(Request $res, $id) {
		$location = Location::find($id);
		$location->image_id = $res->image_id;
		$location->code = $res->code;
		$location->name = $res->name;
		$location->address = $res->address;
		$location->description = $res->description;
		$location->save();
		return redirect('admin/location/update/' . $id)
			->with('thongbao', 'successfully');
	}
	public function deleteLocation($id) {
		$location = Location::find($id);
		$location->delete();
		return redirect('admin/location/list')->with('thongbao',
			"Deleted location have id = $location->id");
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
