<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;

use Closure;

class AdminLoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
           $user = Auth::user();
           if($user->is_root == 1 && $user->changed_password == 1)
               return $next($request);
           else
               return redirect()->route('admin.getLogin');
        }
        else
        {
           return redirect()->route('admin.getLogin');
        }

    }
}
