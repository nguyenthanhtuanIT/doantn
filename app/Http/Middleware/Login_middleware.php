<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class Login_middleware
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
        if (Auth::check())
        {
            $u = Auth::user();
            if ($u->role_id == 1)
            {
                return $next($request);
            }
        }else{
            return redirect('signin.html');
        }
        
    }
}
