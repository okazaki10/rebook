<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Helper\Helper;
class SessionHasAdmin
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
        $auth = Helper::auth(Session::get('email'),Session::get('password'));
        if ($auth != null){
        if ($auth->status == 3){
            return $next($request);
        }else{
            return redirect('/');
        }
        }else{
            return redirect('/');
        }
    }
}
