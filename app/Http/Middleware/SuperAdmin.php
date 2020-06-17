<?php

namespace App\Http\Middleware;

use Closure;
use App\user;

class SuperAdmin
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
        // get the number of registered users
        $user = User::all()->count();

        if(!$user==0){
            if(!Auth::user()->hasPermissionTo('administer roles and permissions')){
                abort(401);
            }
        }
        return $next($request);
    }
}
