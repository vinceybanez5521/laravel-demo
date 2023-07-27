<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEmployeeAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $employeeId): Response
    {
        // echo $request->path(); // You have access to the url requested by the user

        if($request->route('id') == 5) {
            // return response("This information is confidential");
            return redirect()->route('restrict');
        }
        return $next($request);
    }
}
