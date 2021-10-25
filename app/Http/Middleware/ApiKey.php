<?php

namespace App\Http\Middleware;

use Closure;

class ApiKey
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
        $apiKey = 'i9Ey9mlq7qcrCjHH8Rpe1U42OEWZeiuKOIuoHIiTr59GHJvYSvMYEDtRXwBs';
        $token = $request->header('api_token');

        if($token !== $apiKey)
        {
            return response('Not allowed');
        }
        return $next($request);
    }
}
