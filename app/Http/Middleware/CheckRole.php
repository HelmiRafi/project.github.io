<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
   
    public function handle($request, Closure $next, $role)
{
   

    return $next($request);
}

}
