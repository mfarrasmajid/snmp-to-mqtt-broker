<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CekAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->session()->has('user')){
            $user = $request->session()->get('user');
            if (isset($user->is_admin)){
                if ($user->is_admin){
                    return $next($request);
                } else {
                    return redirect()->route('dashboard');
                }
            } else {
                return redirect()->route('dashboard');
            }
        } else {
            return redirect()->route('dashboard');
        };
    }
}
