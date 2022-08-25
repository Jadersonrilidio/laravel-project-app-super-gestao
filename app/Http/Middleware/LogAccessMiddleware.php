<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\LogAccess;

class LogAccessMiddleware
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
        $ip = $request->server->get('REMOTE_ADDR');
        $route = $request->getRequestUri();

        LogAccess::create([
            'log' => "IP $ip requested the route $route"
        ]);

        $response = $next($request);
        // $response->setStatusCode('201', 'The response status code and text were modified!');

        return $response;
        // return $next($request);
    }
}
