<?php

namespace Modules\DynamicPage\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         *
         * Module Menu for Admin Backend
         *
         * *********************************************************************
         */
        // Menu items are now handled in the main app's GenerateMenus middleware
        // This middleware is kept for potential future module-specific menu items

        return $next($request);
    }
}
