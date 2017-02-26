<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class ClientMiddleware
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


        if (Auth::check()){
            if(Auth::user()->isClient()){
                return $next($request);
            }else{
                return response(view('errors.404'));
            }
        }
        return redirect('/');
    }
}
