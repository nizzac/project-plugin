<?php

namespace Nizzac\Project\Middleware;

use Backend\Facades\BackendAuth;
use Closure;

class ProjectApiMiddleware
{
    public function handle($request, Closure $next)
    {
        if (!BackendAuth::check()) {
            return response()->json('Forbidden');
        }
        
        return $next($request);       
    }
}