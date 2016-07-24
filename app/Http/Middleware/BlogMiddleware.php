<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Request;

class BlogMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {    
        $input = Request::input('param_name');
        
        if($input != 'abc') {
            abort('404');
        }
        return $next($request);
    }
}
