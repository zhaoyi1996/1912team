<?php

namespace App\Http\Middleware;

use Closure;

class SessionLogin
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
        $session=session('User_Info');
        if(empty($session)){
            return redirect('/index/login');
        }else{
            return $next($request);
        }

    }
}
