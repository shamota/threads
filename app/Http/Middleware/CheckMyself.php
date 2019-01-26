<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckMyself
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param  Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->user();
        $routeParam = $request->route('user');
        if ($user->hasRole('admin') || $user->id === $routeParam->id) {
            return $next($request);
        }

        return redirect('/');
    }
}
