<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class apiKey
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->token !== 'AvtJ7D7fmUqGb8nAZFW1') {

            return "!!!!!";
        }

        return $next($request);
    }
}
