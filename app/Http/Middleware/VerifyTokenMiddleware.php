<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;

class VerifyTokenMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        // Retrieve the token from the request headers
        $token = $request->header('Authorization');

        if (!$token) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        // Send the token to the User microservice for validation
        $response = Http::withHeaders(['Authorization' => $token])
            ->get(env('USER_SERVICE_URL') . '/api/verify-token'); // Assuming the endpoint for token verification

        if ($response->failed()) {
            return response()->json(['error' => 'Invalid token'], 401);
        }

        return $next($request);
    }
}
