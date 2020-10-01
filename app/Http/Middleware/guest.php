<?php

namespace App\Http\Middleware;

use Closure;

class guest
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
        if (session('userpass') == 'pass'){
            return $next($request);
        }
        else{
            return redirect('/board/login');
        }
    }
}
