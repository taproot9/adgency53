<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class SubscribeMiddleware
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

        if (Auth::check()){     //check if the user is login

            if (Auth::user()->isClient()){
                return redirect('/');
            }else if(Auth::user()->isOwner() && !Auth::user()->isSubscribe()){
                return response(view('subscriptionplan'));
            }else{
                return response(view('errors.404'));
            }
        }

        return $next($request); //go the next request of the application

    }
}
