<?php


namespace App\Http\Middleware;

use Closure;

class CheckId
{
    public function handle($request, Closure $next)
    {
        // check if the ID exists and belongs to the authenticated user
        // return a response or continue to the next middleware
        return $next($request);
    }
}
