<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserTypeMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$userType): Response
    {
        $user = $request->user();

        if ($request->user() && $request->user()->usr_acc_type == $userType) {
            return $next($request);
        }

        return response('Unauthorized', 403);
    }
}
