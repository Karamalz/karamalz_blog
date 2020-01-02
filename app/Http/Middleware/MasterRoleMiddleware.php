<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MasterRoleMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->roles->roles != 'WebMaster') {
            flash('You are not WebMaster')->warning(); 
            return back();
        }
        return $next($request);
    }
}
