<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;

class Customercontroller extends Controller {
	public function getCustomer() {
		$cus = new Customer;
		$customer = $cus->show();
		return view('admin.customer.danhsach', ['customer' => $customer]);
	}
	public function getAddcustomer() {
		return view('admin.customer.them');
	}
	public function postAddcustomer(Request $req) {
		$cus = new Customer;
		$customer = $cus->add($req);
		return redirect('admin/customer/add')->with('thongbao', 'successfully');
	}
	public function getUpdatecustomer($id) {
		$cus = new Customer;
		$customer = $cus->getbyId($id);
		return view('admin.customer.sua', ['customer' => $customer]);
	}
	public function postUpdatecustomer(Request $req, $id) {
		$cus = new Customer;
		$customer = $cus->getbyId($id);
		$customer->add($req);
		return redirect('admin/customer/update/' . $id)->with('thongbao', 'successfully');
	}
	public function deleteCustomer($id) {
		$cus = new Customer;
		$cus->del($id);
		return redirect('admin/customer/list')->with('thongbao', "Deleted");
	}
	public function editCustomer(Request $req, $id) {
		$cus = new Customer;
		$customer = $cus->getbyId($id);
		$customer->add($req);
		return redirect('configuser/' . $req->user_id)->with('thongbao', 'successfully');
	}
}
