<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
 
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'admin/staff/list';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
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
            session()->flash('message', 'Đăng nhập thành công');
            return redirect()->route('admin.staff.list');

        }
      
        else
        {
            session()->flash('message', 'Đăng nhập không thành công');
            return redirect()->route('admin.getLogin');
            
        }
    }


    public function getLogout()
    {
        Auth::logout();
        redirect('admin.getLogin');
        session()->flash('message', 'Đăng xuất thành công');

    }
}
