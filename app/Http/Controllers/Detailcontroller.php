<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Detail;
use App\Image;
use App\Company;
use App\Comment;

class Detailcontroller extends Controller
{
     public function getDetail()
    {
    	$detail = Detail::paginate(1);
    	return view('admin.detail.danhsach',['detail' => $detail]);
    }
    public function getAdddetail()
    {
     	return view('admin.detail.them');
    }
    public function postAdddetail(Request $res)
    {
     	$detail = new Detail;
    	$detail->tour_id = $res->tour_id;
    	$detail->detail = $res->detail;	
    	$detail->save();
    	return redirect('admin/detail/add')->with('thongbao', 'successfully');
    }
    public function getUpdatedetail($id)
    {
    	$detail = Detail::find($id);
    	return view('admin.detail.sua',['detail' => $detail]);
    }
    public function postUpdatedetail(Request $res, $id)
    {
    	$detail = Detail::find($id);
    	$detail->tour_id = $res->tour_id;
    	$detail->detail = $res->detail;		
    	$detail->save();
    	return redirect('admin/detail/update/' .$id)->with('thongbao', 'successfully');
    }
    public function deleteDetail($id)
    {
    	$detail = Detail::find($id);
    	$detail->delete();
    	return redirect('admin/detail/list')->with('thongbao', 
    		"Deleted detail have id = $detail->id");
    }
    //output detail tour
    public function showDetail($id)
    {
        $detail = Detail::where('tour_id',$id)->get();
        $image = Image::where('img','tour')->get();
        $company = Company::all();
        $comment = Comment::where(['KT' => 1, 'tour_id' => $id])->orderBy('id','DESC')->get();
        return view('pages.blog',compact('detail','image','company','comment'));
    }
}
