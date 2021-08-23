<?php


namespace App\Http\Middleware;

use Closure;
class CheckGroup
{

    public function handle($request, Closure $next)
    {
        if(in_array(Auth()->user()->group_id,[1,2]))
        {
            return $next($request);
        }
        return redirect('/');

    }
}