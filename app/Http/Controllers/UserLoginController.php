<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    public function getLogin() 
    {
    	return view('pages.login');
    }
    // public function postLogin(LoginRequest $request)
    // {
    // 	if(Auth::attempt(
           
    //        [
    //        	'email' => $request->email,

    //         'password' => $request->password
    //        ]
    //     ))
    //     {
    //     	session()->flash('message', 'Đăng nhập thành công');
    //     	return redirect('pages.index');

    //     }
      
    //     else
    //     {
    //     	session()->flash('message', 'Đăng nhập không thành công');
    //     	return redirect()->route('user.login.getLogin');
        	
    //     }
    // }
}
