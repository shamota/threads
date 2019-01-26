<?php

namespace App\Http\Middleware;

use App\Models\Thread\Thread;
use Closure;
use Illuminate\Http\Request;

class CheckThreadAuthor
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
        /** @var Thread $thread */
        $thread = $request->route('thread');

        if ($thread->author_id === $user->id || $user->hasRole('admin')) {
            return $next($request);
        }

        return redirect('/');
    }
}
