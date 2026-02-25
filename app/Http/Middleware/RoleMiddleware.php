<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Traits\ApiResponse;

class RoleMiddleware
{
    use ApiResponse;
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {
        // 1. Check if user is authenticated via JWT
        if (!auth('api')->check()) {
            return $this->errorResponse('Unauthorized. Please login.', 401);
        }

        // 2. Check Role (Cast to int to ensure strict comparison works)
        if ((int) auth('api')->user()->role !== (int) $role) {
            return $this->forbiddenResponse('You do not have permission to access this portal.');
        }

        return $next($request);
    }
}
