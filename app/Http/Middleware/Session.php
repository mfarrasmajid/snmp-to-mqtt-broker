<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use DB;

class Session
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
        if ($request->session()->has('id')) {
            $id = $request->session()->get('id');
            $user = DB::table('users')->where('id', $id)
                                      ->select('*')
                                      ->get();
            if (count($user) > 0){
                $user = $user->first();
                unset($user->password);
                $request->session()->put('user', $user);
                return $next($request);
            } else {
                $request->session()->flush();
                return redirect()->route('login')->with('error', 'User tidak ditemukan, mohon login dengan akun yang valid!');
            }                       
        } else {
            $request->session()->flush();
            return redirect()->route('login')->with('error', 'Mohon login dengan user yang valid!');
        }
    }
}
