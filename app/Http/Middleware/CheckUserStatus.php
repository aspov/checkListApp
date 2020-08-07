<?php

namespace App\Http\Middleware;

use Closure;

class CheckUserStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (\Auth::user()->status == 'blocked') {
            return redirect()->route('block');
        }

        if ($request->URL() == route('block')) {
            return redirect()->route('home');
        }

        return $next($request);
    }
}
