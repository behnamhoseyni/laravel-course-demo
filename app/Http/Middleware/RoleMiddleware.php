<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle the incoming request.
     * @param Request $request
     * @param Closure $next
     * @param string $role
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        if (! $request->user()->hasRole($role)) {
            return redirect()->route('home')->withErrors(__('auth.not_authorized'));
        }

        return $next($request);
    }
}
