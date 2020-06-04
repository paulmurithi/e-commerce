<?php

namespace App\Http\Middleware;

use Closure;

class checkBalance
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if($request->user()->hasRole()){
            return Redirect('home');
        }
        return $next($request);
    }
}
