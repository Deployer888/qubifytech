<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Signed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($exception instanceof \Illuminate\Routing\Exceptions\InvalidSignatureException) {
            return response()->view('errors.link-expired', [], 403);
        }
    
        return parent::render($request, $exception);
        
        return $next($request);
    }
}
