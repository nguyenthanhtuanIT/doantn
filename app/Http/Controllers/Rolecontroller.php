<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\Users;

class Rolecontroller extends Controller
{
    public function getRole()
    {
    	$role = Role::paginate(5);
    	return view('admin.role.danhsach',['role' => $role]);
    }
    public function getAddrole()
    {
    	return view('admin.role.them');
    }
    public function postAddrole(Request $res)
    {
    	$this->validate($res,
    		[
                'name' => 'required|min:5|max:100'
    	    ],
    	    [
                'name.required' => 'You have to fill name',
                'name.min' => 'Name have to less five character',
                'name.max' => 'Name > 100'
    	    ]);
    	$role = new Role;
    	$role->name = $res->name;
    	$role->description = $res->description;
    	$role->save();
    	return redirect('admin/role/add')->with('thongbao', 'successfully');
    }
    public function getUpdaterole($id)
    {
    	$role = Role::find($id);
    	return view('admin.role.sua',['role' => $role]);
    }
    public function postUpdaterole(Request $res, $id)
    {
    	$role = Role::find($id);
        $this->validate($res,
    		[
                'name' => 'required|min:5|max:100'
    	    ],
    	    [
                'name.required' => 'You have to fill name',
                'name.min' => 'Name have to less five character',
                'name.max' => 'Name > 100'
    	    ]);
        $role->name = $res->name;
    	$role->description = $res->description;
    	$role->save();
    	return redirect('admin/role/update/' .$id)->with('thongbao', 'successfully');
    }
    public function deleteRole($id)
    {
    	$role = Role::find($id);
    	$role->delete();
    	return redirect('admin/role/list')->with('thongbao', "Deleted $role->name");
    }
}
