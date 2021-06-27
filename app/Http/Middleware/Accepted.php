<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Closure;
use Auth;


class Accepted
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
        if (Auth::user() &&  Auth::user()->accepted == 1) {
             return $next($request);
        }
        if (Auth::user() && Auth::user()->email_verified_at == NULL){
            return redirect('/email/verify')->with('error','Musisz najpierw potwierdzić swoją tożsamość!');
        } else {
            return redirect('/not-accepted')->with('error','Musisz poczekać na weryfikację!');
        }
    }
}
