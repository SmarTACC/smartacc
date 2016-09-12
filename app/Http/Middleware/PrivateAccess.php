<?php

namespace App\Http\Middleware;

use Closure;

class PrivateAccess {
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (env("PRIVATE_ACCESS_COOKIE_ADMIN_VALUE") == $request->cookie(env("PRIVATE_ACCESS_COOKIE_NAME"))
        ||  env("PRIVATE_ACCESS_COOKIE_USER_VALUE") == $request->cookie(env("PRIVATE_ACCESS_COOKIE_NAME"))) {
            return $next($request);
        }
        return redirect('/privateaccess');
    }
}
