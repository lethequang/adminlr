<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StaffRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Session;
use App\Department;
use App\Position;
use Mail;
use App\Mail\ResetMail;
use App\Staff;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use DB;
use App\Department_Position_Staff;
use DateTime;
use DateTimeZone;
use Hash;

class StaffController extends Controller
{
	public function getList() 
	{   
		// $id = Auth::user()->id;
  //   	$departments = Staff::findOrFail($id)->departments()->get()->toArray();
  //       $positions = Staff::findOrFail($id)->positions()->get()->toArray();
  //       $department_position = array();
  //       //dd($departments);
  //       for($i = 0; $i<count($departments); $i++){
  //           $department_position[$departments[$i]['name']] = $positions[$i]['name'];
            
  //       }
        
        
  //       foreach ($departments as $department) {
  //           $departments_id[] = $department['id'];
  //       }

  //       $employees_id = array();
  //       $employees_id = Department_Position_Staff::whereIn('department_id', $departments_id)->select('staff_id')->get()->toArray();

  //       $employees = Staff::whereIn('id', $employees_id)->get();
        
  //       $users = DB::table('department_position_staff')
  //           ->join('staff', 'department_position_staff.staff_id', '=', 'staff.id')
  //           ->join('department', 'department_position_staff.department_id', '=', 'department.id')
  //           ->join('position', 'department_position_staff.position_id', '=', 'position.id')
            
  //           ->whereIn('department.id', $departments_id)
  //           ->select('staff.id', 'staff.name as staff-name', 'department.name as department-name', 'position.name as position-name')
  //           ->get();
            // dd($users);
            // echo Auth::user()->id;
            // return view('admin.staff.list', compact('users'));
		$staff = Staff::all();
		return view('admin.staff.list',compact('staff'));
	}
 
	public function getAdd() 
	{   $staff = Staff::all();
		$department = Department::all();
		$position = Position::all();
		return view('admin.staff.add', compact('department','position'));
	}

	public function postAdd(StaffRequest $request)
	{   

        // dd($request->all());
		$staff = new Staff;
		$staff->name = $request->name;
		$staff->password =  bcrypt($request->password);
		$staff->address =  $request->address;
		$staff->number_phone =  $request->number_phone;
		$staff->gender =  $request->gender;
		$staff->email =  $request->email;
		$staff->status =  $request->status;
		$staff->changed_password =  0;
		$staff->is_root =  $request->is_root;
		    if ($request->hasFile('images'))
			{
				$file = $request->file('images');
				$duoi = $file->getClientOriginalExtension();
				if ($duoi != 'jpg' && $duoi != 'png' && $duoi != 'jpeg')
				{
					session()->flash('messages', 'Bạn chỉ có thể chọn hình với đuôi jpg, png, jpeg');
					// return redirect()->route('admin.news.add');
				}

				$name = $file->getClientOriginalName();
				$images = str_random(4) . "_" . $name;
				while (file_exists("images/staff/" . $images))
				{
					$images = str_random(4) . "_" . $name;
				}

				$file->move("images/staff", $images);
				$staff->images = $images;
			}
		$staff->save();

		  // if ($request->password != null) {
		  // 	 $email = $request->email;
		  // 	 $password = $request->password;
    //          $subject = "Tạo Tài Khoản";
	   //       $message = "Xin chào, tôi là Eleven bạn đã được tạo tài khoản với password là $password với email là $email vui lòng đăng nhập để đổi mật khẩu";
            
    //          Mail::to($email)->send(new ResetMail($subject, $message));
		  // }
        
	     // $data = DB::table('department_position')->join('position', 'department_position.position_id', '=', 'position.id')->whereIn('department_id',$request->department)->get();
	     // dd($data);
		$department = Department::find($request->department);
		$position = Position::find($request->position);
	    $staff->positions()->attach($position);
        $staff->departments()->attach($department);
	    // $data->save();
		// $staff->department_position()->attach($data);
		session()->flash('messages', 'Thêm Thành Công');
		return redirect()->route('admin.staff.list');
        
	}
	
	
	public function getDelete($id)
	{   
       
		$staff = Staff::where('id',$id);
		$staff->delete();
		session()->flash('messages', 'Xóa Thành Công');
		return redirect()->route('admin.staff.list');
	}

	public function getLogin()
	{
		return view('admin.login');
	}

	public function postLogin(LoginRequest $request){
        if(Auth::attempt(
           
           [
           	'email' => $request->email,

            'password' => $request->password
           ]
        ))
        {

        	if(Auth::user()->changed_password == 0){
        		// session()->flash('messages', 'Đăng nhập thành công');
        	     return redirect()->route('getresetpassword');

        	}else
        	{
        		return redirect()->route('home');
        	}

        }
      
        else
        {
        	session()->flash('messages', 'Đăng nhập không thành công');
        	return redirect()->route('admin.getLogin');
        	
        }
	}

	public function getLogout()
	{
		Auth::logout();
		session()->flash('messages', 'Đăng xuất thành công');
        return redirect()->route('admin.getLogin');
	}
	public function resetpassword(Request $request)
    {     

	         if ($request->list != null) {
	            
	            $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

	            $size = strlen( $chars );
	            $password = "";

	            for( $i = 0; $i < 10; $i++ ) {

	                $password .= $chars[ rand( 0, $size - 1 ) ];
	            }
	            $time = new DateTime("now", new DateTimeZone("Asia/Ho_Chi_Minh"));
	            $time->setTimestamp(time());
	            
	            $staff = Staff::whereIn('id', $request->list)->update(['password' => Hash::make($password), 'changed_password' => 1, 'updated_at' => $time]);
	            $emails = Staff::whereIn('id', $request->list)->select('email')->get()->toArray();
	            $subject = "Reset Password";
	            $message = "Mat khau cua ban da duoc thay doi thanh $password";
	            foreach ($emails as $email) {
	                Mail::to($email)->send(new ResetMail($subject, $message));
	            }
	        }
	        session()->flash('messages', 'Reset password thành công mật khẩu đã được chuyển tới email của người dùng');
	        return redirect()->route('admin.staff.list');
    }


    public function getResetpassword()
    {
    	return view('resetpassword');
    }

      public function postResetpassword(Request $request)
    {
    	 $staff = Staff::where('id', Auth::user()->id )->update(['password' => Hash::make($request->password), 'changed_password' => 1]);
    	return redirect()->route('home');
    }
    // public function testmail(){
    // 	$subject = "Reset Password";
    //     $message = "Mat khau cua ban da duoc thay doi thanh";
    // 	Mail::to('eleven130896@gmail.com')->send(new ResetMail($subject, $message));
    // }
   
}


