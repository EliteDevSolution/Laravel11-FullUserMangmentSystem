<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()) {
            if (auth()->user()->status === 0 || auth()->user()->status === 2) {
                $curStatus = auth()->user()->status === 0 ? __('global.pending') : __('global.reject');
                auth()->logout();
                return redirect()->route('login')->withErrors([
                    'email' => trans('auth.no_access', ['value' => $curStatus]),
                ]);
            }
        }
        return $next($request);
    }
}