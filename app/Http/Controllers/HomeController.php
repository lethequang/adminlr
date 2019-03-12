<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Staff;
use App\Http\Requests\StaffRequest;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('auth');
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $user = Auth::user();
        return view('home',compact('user'));
    }

    public function getEditUser()
    {   
        $user = Auth::user();
        return view('pages.edit',compact('user'));

    }
   
        
    public function postEditUser(Request $request)
    {
        $this->validate($request,[
              'name' => 'required|min:2|max:255',
              'email' => 'required|unique:staff,email',
              'password' => 'required',
              'images' => 'required',
          
        ],[
              'name.required' => 'Bạn chưa nhập tên người dùng',
              'name.min' => 'Tên người dùng phải chứa từ 2 đến 255 kí tự',
              'name.max' => 'Tên người dùng phải chứa từ 2 đến 255 kí tự',  
              'email.unique' => 'Tên email đã bị trùng',
              'email.required' => 'Bạn chưa nhập email',
              'password.required' => 'Bạn chưa nhập password',
              'images.required' => 'Bạn chưa chọn ảnh',
             ]);
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->address = $request->address;
        $user->password = bcrypt($request->password);
        $user->images = bcrypt($request->images);
        $user->gender = $request->gender;
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
                $user->images = $images;
            }
        $user->save();
        session()->flash('messages', 'Chỉnh Sửa Thành Công');
        return redirect()->route('home');

    }
   
}
