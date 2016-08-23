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
        $cookiename = "cookiemonster";
        $cookievalue = "cookiesaredelicious";
        if ($cookievalue == $request->cookie($cookiename)) {
            return $next($request);
        }
        return redirect('/privateaccess');
    }
}
