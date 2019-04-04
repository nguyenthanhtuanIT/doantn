<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Tour;
use App\Image;
use Carbon\Carbon;

class Tourcontroller extends Controller
{
      public function getTour()
    {
        $slide = Image::where('img', 'slide')->get();
    	$dstour = Tour::orderBy('id', 'DESC')->paginate(4);
        $image = Image::where('img','chude')->get();
        $tournb = Tour::where('tag_id',2)->orderBy('id','DESC')->paginate(4);
        return view('index',[
          'dstour' => $dstour,
          'image' => $image,
          'slide' => $slide,
          'tournb' => $tournb
      ]);
    }
    public function getTouradmin()
    {
        $tour = Tour::paginate(10);
        return view('admin.tour.danhsach',['tour' => $tour]);
    }
    public function getAddtour()
    {
        return view('admin.tour.them');
    }
    public function postAddtour(Request $res)
    {
        $tour = new Tour;
        $tour->company_id = $res->company_id;
        $tour->tag_id = $res->tag_id;
        $tour->title = $res->title;
        $tour->route = $res->route; 
        $tour->mean = $res->mean; 
        $tour->time_start = $res->time_start;
        $tour->time_end = $res->time_end;
        $tour->amount = $res->amount; 
        $tour->status = $res->status;
        $tour->description = $res->description; 
        $tour->price = $res->price;
        $tour->save();
        return redirect('admin/tour/add')->with('thongbao', 'successfully');
    }
    public function getUpdatetour($id)
    {
        $tour = Tour::find($id);
        return view('admin.tour.sua',['tour' => $tour]);
    }
    public function postUpdatetour(Request $res, $id)
    {
        $tour = Tour::find($id);
        $tour->company_id = $res->company_id;
        $tour->tag_id = $res->tag_id;
        $tour->title = $res->title;
        $tour->route = $res->route; 
        $tour->mean = $res->mean; 
        $tour->time_start = $res->time_start;
        $tour->time_end = $res->time_end;
        $tour->amount = $res->amount; 
        $tour->status = $res->status;
        $tour->description = $res->description; 
        $tour->price = $res->price;
        $tour->save();
        return redirect('admin/tour/update/' .$id)->with('thongbao', 'successfully');
    }
    public function deleteTour($id)
    {
        $tour = Tour::find($id);
        $tour->delete();
        return redirect('admin/tour/list')->with('thongbao', 
            "Deleted tour have id = $tour->id");
    }
    public function Search(Request $req, $key)
    {
       
        $slide = Image::where('img', 'slide')->get();
        $dstour = Tour::where('title', 'like', "%$key%")->take(10)->paginate(5);
        $image = Image::where('img','chude')->get();
        $tournb = Tour::where('tag_id',2)->orderBy('id','DESC')->take(6)->get();
        return view('pages.search', [
          'dstour' => $dstour,
          'image' => $image,
          'slide' => $slide,
          'tournb' => $tournb,
          'key' => $key
      ]);
    }

}
