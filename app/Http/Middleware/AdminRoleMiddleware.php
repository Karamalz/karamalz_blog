<?php

namespace App\Http\Middleware;

use Closure;

use App\services\RoleService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminRoleMiddleware
{
    public function handle($request, Closure $next)
    {
        if(Auth::user()->roles->roles != 'WebMaster') {
            flash('You are not WebMaster')->warning(); 
            return redirect('/home');
        }
        return $next($request);
    }
}
