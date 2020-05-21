<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use App\Daftar;
use App\Helper\Helper;
class SessionHasPenjual
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
    
        /*
       if(Session::get('user') == '2') {
        return $next($request);
        }else{
        return redirect('/');
        }
        */
        
  
        $auth = Helper::auth(Session::get('email'),Session::get('password'));
        if ($auth != null){
        if ($auth->status == 2 || $auth->status == 3){
            return $next($request);
        }else{
            return redirect('/');
        }
        }else{
            return redirect('/');
        }
       
    }
}
