<?php

namespace App\Http\Middleware;

use Closure;

class CheckLogin
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
        //取出session值
//        $user = session("userInfo");
//        if(!$user){
//            return redirect("/admin/login");
//        }
        return $next($request);
    }
}
