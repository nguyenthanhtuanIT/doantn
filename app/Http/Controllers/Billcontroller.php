<?php

namespace App\Http\Controllers;

use App\Bill;
use App\Customer;
use App\Tour;
use Illuminate\Http\Request;
use Mail;

class Billcontroller extends Controller {
	public function getBill() {
		$bill = Bill::paginate(5);
		return view('admin.bill.danhsach', ['bill' => $bill]);
	}
	public function getAddbill() {
		return view('admin.bill.them');
	}
	public function postAddbill(Request $req) {
		$bill = new Bill;
		$bill->user_id = $req->user_id;
		$bill->tour_id = $req->tour_id;
		$bill->amount = $req->amount;
		$bill->price = $req->price;
		$bill->totalprice = $req->totalprice;
		$bill->save();
		return redirect('admin/bill/add')->with('thongbao', 'successfully');
	}
	public function getUpdatebill($id) {
		$bill = Bill::find($id);
		return view('admin.bill.sua', ['bill' => $bill]);
	}
	public function postUpdatebill(Request $req, $id) {
		$bill = Bill::find($id);
		$bill->user_id = $req->user_id;
		$bill->tour_id = $req->tour_id;
		$bill->amount = $req->amount;
		$bill->price = $req->price;
		$bill->totalprice = $req->totalprice;
		$bill->save();
		return redirect('admin/bill/update/' . $id)->with('thongbao',
			'successfully');
	}
	public function deleteBill($id) {
		$bill = Bill::find($id);
		$bill->delete();
		return redirect('admin/bill/list')->with('thongbao',
			"Deleted bill have id = $bill->id");
	}
	public function Books($id) {
		$tour = Tour::find($id);
		$customer = Customer::all();
		return view('pages.bookstour', compact('tour', 'customer'));
	}
	public function postBooks(Request $req) {
		$bill = new Bill;
		$tour = Tour::find($req->tour_id);
		$customer = Customer::where('user_id', $req->user_id)->get();
		$bill->user_id = $req->user_id;
		$bill->tour_id = $req->tour_id;
		$bill->amount = $req->amount;
		$bill->price = $req->price;
		$bill->totalprice = $req->totalprice;
		$bill->save();
		if ($tour->amount >= $req->amount) {
			$tour->amount = $tour->amount - $req->amount;
		} else {
			$tour->amount = 0;
		}

		$tour->company_id = $req->company_id;
		$tour->tag_id = $req->tag_id;
		$tour->title = $req->title;
		$tour->route = $req->route;
		$tour->mean = $req->mean;
		$tour->time_start = $req->time_start;
		if ($tour->amount == 0) {
			$tour->status = "Hết";
		} else {
			$tour->status = "Còn trống";
		}
		$tour->description = $req->description;
		$tour->price = $req->price;
		$tour->save();
		foreach ($customer as $cus) {
			//dd($cus);
			$c = $cus->email;
			$data = ['fullname' => $cus->name,
				'email' => $cus->email,
				'phone' => $cus->phone,
				'address' => $cus->address,
				'tour' => $tour->id];
			Mail::send('pages.mail', $data, function ($msg) {
				$msg->from('doantnbookstour2015@gmail.com', 'Tuấn Nguyễn');
				$msg->to("tuandnd241@gmail.com", 'Customer')->subject('mail confirm');
			});
		}
		return redirect('bookstour.html/' . $req->tour_id)
			->with('thongbao', 'successfully');
	}
}
