<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidateEmail
{
    public function handle(Request $request, Closure $next)
    {
        $email = $request->input('email');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return response()->json([
                'message' => 'You are not authorized to access this resource'
            ], 422);
        }

        return $next($request);
    }
}
