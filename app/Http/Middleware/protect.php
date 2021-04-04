<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class protect
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {

        if (!$request->session()->has('user')) {
            return response()->json(['status' =>  "error", 'message' => 'Please Log in first'], 400);
        }
        if (session('user')[0]->role == 'teacher' || session('user')[0]->role == 'admin') {
            return $next($request);
        }
        return response()->json(['status' => 'error', 'message' => 'You Are not allowed to do this'], 400);
    }
}
