<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ValidatePassword
{
    public function handle(Request $request, Closure $next)
    {
        $password = $request->input('password');

        if (strlen($password) < 5) {
            return response()->json([
                'message' => 'Password must be at least 5 characters'
            ], 422);
        }

        return $next($request);
    }
}
