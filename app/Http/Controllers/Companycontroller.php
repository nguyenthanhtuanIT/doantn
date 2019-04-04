<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class Companycontroller extends Controller {
	public function getCompany() {
		$com = new Company;
		$company = $com->show();
		return view('admin.company.danhsach', ['company' => $company]);
	}
	public function getAddcompany() {
		return view('admin.company.them');
	}
	public function postAddcompany(Request $req) {
		$com = new Company;
		$company = $com->add($req);
		return redirect('admin/company/add')->with('thongbao', 'successfully');
	}
	public function getUpdatecompany($id) {
		$com = new Company;
		$company = $com->getbyId($id);
		return view('admin.company.sua', ['company' => $company]);
	}
	public function postUpdatecompany(Request $req, $id) {
		$com = new Company;
		$company = $com->getbyId($id);
		$company->add($req);
		return redirect('admin/company/update/' . $id)->with('thongbao', 'successfully');
	}
	public function deleteCompany($id) {
		$com = new Company;
		$com->del($id);
		return redirect('admin/company/list')->with('thongbao', "Deleted");
	}
}
