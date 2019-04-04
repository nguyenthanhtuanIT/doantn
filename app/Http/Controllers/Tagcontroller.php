<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class Tagcontroller extends Controller
{
    public function getTag()
	{
		$tag = Tag::paginate(5);
		return view('admin.tag.danhsach',['tag' => $tag]);
	}
	public function getAddtag()
	{
		return view('admin.tag.them');
	}
	public function postAddtag(Request $res)
	{
		$this->validate($res,
			[
				'title' => 'required|min:5|max:100'
			],
			[
				'title.required' => 'You have to fill title',
				'title.min' => 'Name have to less five character',
				'title.max' => 'Name > 100'
			]);
		$tag = new Tag;
		$tag->title = $res->title;
		$tag->save();
		return redirect('admin/tag/add')->with('thongbao', 'successfully');
	}
	public function getUpdatetag($id)
	{
		$tag = Tag::find($id);
		return view('admin.tag.sua',['tag' => $tag]);
	}
	public function postUpdatetag(Request $res, $id)
	{
		$tag = Tag::find($id);
		$this->validate($res,
			[
				'title' => 'required|min:5|max:100'
			],
			[
				'title.required' => 'You have to fill title',
				'title.min' => 'Title have to less five character',
				'title.max' => 'Title > 100'
			]);
		$tag->title = $res->title;
		$tag->save();
		return redirect('admin/tag/update/' .$id)->with('thongbao', 'successfully');
	}
	public function deleteTag($id)
	{
		$tag = Tag::find($id);
		$tag->delete();
		return redirect('admin/tag/list')->with('thongbao', "Deleted $tag->title");
	}
}
