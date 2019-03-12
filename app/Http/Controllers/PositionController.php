<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PositionRequest;
use Illuminate\Http\Session;
use App\Position;
use Carbon\Carbon;
use DB;
class PositionController extends Controller
{
	public function getList() 
	{
		$position = Position::all();

		return view('admin.position.list',compact('position'));
	}

	public function getAdd() 
	{
		$parent = Position::all();
		return view('admin.position.add',compact('parent'));
	}
   

	public function postAdd(PositionRequest $request)
	{
		// dd($request->name);
		$position = new Position;
		$position->name = $request->name;
		$position->sort_order =  $request->order;
		$position->parent_id =  $request->parent;
		$position->save();
		session()->flash('messages', 'Thêm Thành Công');
		return redirect()->route('admin.position.list');

	}

	public function getDepartment(Request $request) 
	{
	  $position = DB::table('department_position')->join('position', 'department_position.position_id', '=', 'position.id')->whereIn('department_id',$request->type)->get();
	  $data = [];
	  foreach ($position as $pos ) {
	  	 $data[] = ['id' => $pos->id , 'code' => $pos->id, 'name' => $pos->name];
	  }
	  return response()->json($data);
      // dd($position);
      // die();
	}

	public function getEdit($id)
	{
		$position = Position::find($id);
		$parent = Position::all();
		return view('admin.position.edit', compact(['position', 'parent']));

	}

	public function postEdit(PositionRequest $request, $id)
	{
		$position = Position::find($id);
		$position->name = $request->name;
		$position->sort_order =  $request->order;
		$position->parent_id = $request->parent;
		$position->update();
		session()->flash('messages', 'Chỉnh Sửa Thành Công');
		return redirect()->route('admin.position.list');
	}
	
	
	public function getDelete($id){
		// $department = Department::find($id);
		$position = Position::where('id',$id)->delete();
		session()->flash('messages', 'Xóa Thành Công');
		return redirect()->route('admin.position.list');
	}
}
