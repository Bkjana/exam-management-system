<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // echo "middleware admin";

        if(session()->has('student')){
            session()->remove('student');
        }

        if(session()->has('teacher')){
            session()->remove('teacher');
        }

        if(session()->has('admin')){
            return $next($request);
        }
        
        return response(redirect("/"));
    }
}
