<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class usermiddleware
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
        if(!Auth::guest()&&(Auth::user()->role==0)){
            return $next($request);
        }
        else{
            //$this->middleware('auth');
            return redirect('/home');
        }
    }
}
