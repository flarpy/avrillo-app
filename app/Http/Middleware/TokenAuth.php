<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/*
 * restrict access to those requests that send a request header with a valid token
 */
class TokenAuth
{
    const HEADER_NAME = 'API_TOKEN';

    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(!$request->hasHeader(self::HEADER_NAME)){
            return response()->json(['error' => 'You must include an api token to access this API.'],403);
        };

        // in a real application, tokens would obviously be issued per user, not stored in an env file.
        if($request->header(self::HEADER_NAME) !== env('API_TOKEN')){
            return response()->json(['error' => 'Invalid api token'],403);
        };

        return $next($request);
    }
}
