<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // echo "middleware student";
        
        if(session()->has('admin')){
            session()->remove('admin');
        }

        if(session()->has('teacher')){
            session()->remove('teacher');
        }

        if(session()->has('student')){
            return $next($request);
        }
        
        return response(redirect("/"));
    }
}
