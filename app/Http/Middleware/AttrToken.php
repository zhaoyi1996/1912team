<?php

namespace App\Http\Middleware;

use Closure;

class AttrToken
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
        $validator = Validator::make($request->all(), [
            'attr_name' => 'required|unique:shop_attr|max:80|column',
        ]);
        return $next($request);
    }
    public function messages(){
        return [
            'title.required' => 'A title is required',
            'body.required' => 'A message is required',
        ];
    }
}
