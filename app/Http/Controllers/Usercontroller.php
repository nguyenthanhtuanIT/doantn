<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Http\Requests\Register;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Usercontroller extends Controller {
	public function getUser() {
		$user = Users::paginate(5);
		return view('admin.user.danhsach', ['user' => $user]);
	}
	public function getAdduser() {
		return view('admin.user.them');
	}
	public function postAdduser(Request $req) {
		$user = new Users;
		$user->role_id = $req->role_id;
		$user->username = $req->username;
		$user->password = bcrypt($req->password);
		$user->save();
		return redirect('admin/user/add')->with('thongbao', 'successfully');
	}
	public function getUpdateuser($id) {
		$user = Users::find($id);
		return view('admin.user.sua', ['user' => $user]);
	}
	public function postUpdateuser(Request $req, $id) {
		$user = Users::find($id);
		$user->role_id = $req->role_id;
		$user->username = $req->username;
		$user->password = bcrypt($req->password);
		$user->save();
		return redirect('admin/user/update/' . $id)->with('thongbao', 'successfully');
	}
	public function deleteUser($id) {
		$user = Users::find($id);
		$user->delete();
		return redirect('admin/user/list')->with('thongbao', "Deleted $user->username");
	}
	public function getSignin() {
		return view('pages.login');
	}
	public function postSignin(Request $req) {
		if (Auth::attempt(['username' => $req->username,
			'password' => $req->password,
			'role_id' => 1])) {
			return redirect('admin/tour/list');
		} elseif (Auth::attempt(['username' => $req->username,
			'password' => $req->password,
			'role_id' => 2])) {
			return redirect('index.html');
		} else {
			return redirect('login.html')->with('thongbao',
				'password or username is false!');
		}

	}
	public function getSignout() {
		Auth::logout();
		return redirect('login.html');
	}
	public function getRegister() {
		return view('pages.register');
	}
	public function postRegister(Register $req) {
		$user_id = Users::orderBy('id', 'DESC')->first();
		$user = new Users;
		$register = new Customer;
		$user->role_id = 2;
		$user->username = $req->username;
		$user->password = bcrypt($req->password);
		$register->user_id = ($user_id->id + 1);
		$register->name = $req->fullname;
		$register->email = $req->email;
		$register->address = $req->address;
		$register->phone = $req->phone;
		$user->save();
		$register->save();
		return redirect('register.html')->with('thongbao', 'success');
	}
	public function getConfig($id) {
		$customer = Customer::where('user_id', $id)->get();
		return view('pages.usercnf', ['customer' => $customer]);
	}
	public function checkUser($key) {
		$user = Users::where('username', $key)->get();
		echo $user->count();
	}
}