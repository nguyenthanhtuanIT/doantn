<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;

class Rolecontroller extends Controller {
	public function getRole() {
		$r = new Role;
		$role = $r->show();
		return view('admin.role.danhsach', ['role' => $role]);
	}
	public function getAddrole() {
		return view('admin.role.them');
	}
	public function postAddrole(Request $res) {
		$role = new Role;
		$role->add($req);
		return redirect('admin/role/add')->with('thongbao', 'successfully');
	}
	public function getUpdaterole($id) {
		$ro = new Role;
		$role = $ro->getbyId($id);
		return view('admin.role.sua', ['role' => $role]);
	}
	public function postUpdaterole(Request $res, $id) {
		$ro = new Role;
		$role = $ro->getbyId($id);
		$role->add($req);
		return redirect('admin/role/update/' . $id)->with('thongbao', 'successfully');
	}
	public function deleteRole($id) {
		$role = new Role;
		$role->del($id);
		return redirect('admin/role/list')->with('thongbao', "Deleted role");
	}
}
