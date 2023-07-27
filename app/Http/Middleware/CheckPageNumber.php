<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPageNumber
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $page): Response
    {
        // echo $request->path();
        // echo $request->url();
        // echo $request->input('page'); // used to retrieve GET variables

        if($request->input('page') == $page) {
            return redirect()->route('restrict');
        }
        return $next($request);
    }
}
