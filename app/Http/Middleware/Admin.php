<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class Admin
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
        if(!User::haveRoles(['admin']))
            return response('not allowed', 403);
        return $next($request);
    }
}
