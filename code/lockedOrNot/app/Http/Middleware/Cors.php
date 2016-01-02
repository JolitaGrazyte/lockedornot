<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;

class Cors
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
        if(!Request::is('login/*')){
            return $next($request)
                ->header('Access-Control-Allow-Origin' , '*')
                ->header('Access-Control-Allow-Methods', 'POST, GET, OPTIONS, PUT, DELETE')
                ->header('Access-Control-Allow-Headers', 'Content-Type, Accept, Authorization, X-Requested-With, X-Auth-Token');
        }

        return $next($request);
    }
}
