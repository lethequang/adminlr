<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use Illuminate\Http\Session;
use App\Department;
use Carbon\Carbon;
use App\Position;
use DB;

class DepartmentController extends Controller
{
	public function getList() 
	{
		$department = department::all();
		return view('admin.department.list',compact('department'));
	}

	public function getAdd() 
	{  
		$position = Position::all();
		return view('admin.department.add',compact('position'));
	}


	public function postAdd(DepartmentRequest $request)
	{
		$department = new Department;
		$department->name = $request->name;
		$department->save();
		session()->flash('messages', 'Thêm Thành Công');
		return redirect()->route('admin.department.list');

	}

	public function getEdit($id)
	{
		$department = Department::find($id);
		return view('admin.department.edit', compact('department'));

	}

	public function postEdit(Request $request, $id)
	{   
		  // $this->validate($request,[
    //           'name' => 'required|min:2|max:255',
    //           'email' => 'required|unique:staff,email',
    //           'password' => 'required',
    //           'images' => 'required',
          
    //     ],[
    //           'name.required' => 'Bạn chưa nhập tên người dùng',
    //           'name.min' => 'Tên người dùng phải chứa từ 2 đến 255 kí tự',
    //           'name.max' => 'Tên người dùng phải chứa từ 2 đến 255 kí tự',  
    //           'email.unique' => 'Tên email đã bị trùng',
    //           'email.required' => 'Bạn chưa nhập email',
    //           'password.required' => 'Bạn chưa nhập password',
    //           'images.required' => 'Bạn chưa chọn ảnh',
    //          ]);
		  
		$department = Department::find($id);
		$department->name = $request->name;
		$department->sort_order =  $request->order;
		$department->update();
		session()->flash('messages', 'Chỉnh Sửa Thành Công');
		return redirect()->route('admin.department.list');
	}
	
	
	public function getDelete($id){
		// $department = Department::find($id);
		$position = DB::table('department_position')->where('position_id',$id);
		$position->delete();

		$department = Department::find($id);
		$department->delete();
		// $department = Department::where('id',$id)->delete();
		session()->flash('messages', 'Xóa Thành Công');
		return redirect()->route('admin.department.list');
	}
}
