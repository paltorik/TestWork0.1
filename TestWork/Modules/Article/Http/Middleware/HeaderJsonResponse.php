<?php

namespace Modules\Article\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HeaderJsonResponse
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $request->header('Content-Type', 'application/json');
        return $next($request);
    }
}
