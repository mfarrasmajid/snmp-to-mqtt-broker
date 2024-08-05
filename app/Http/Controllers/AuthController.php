<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login (Request $request){
        if ($request->session()->has('id')){
            return redirect()->route('dashboard');
        }
        $data = '';
        return view('auth.login', compact('data'));
    }

    public function submit_login (Request $request){
        $input = $request->all();
        $username = $input['username'];
        $password = $input['password'];
        
        $auth = DB::table('users')->where('username', $username)
                                  ->select('*')
                                  ->get();
        if (count($auth) > 0){
            $auth = $auth->first();
            if (Hash::check($password, $auth->password)){
                $request->session()->put('id', $auth->id);
                $activity = 'Succesfully login with username: '.$username;
                $status = 'SUCCESS';
                $log = DB::table('log')->insertGetId([
                    'activity' => $activity,
                    'status' => $status,
                    'username' => $username,
                ]);
                if ($request->session()->has('last_url')){
                    return redirect()->to($request->session()->has('last_url'));
                } else {
                    return redirect()->route('dashboard');
                }
            } else {
                return redirect()->route('login')->with('error', 'Username or password wrong.');
            }
        } else {
            return redirect()->route('login')->with('error', 'Username or password wrong.');
        }   
    }

    public function logout (Request $request){
        if ($request->session()->has('user')){
            $username = $request->session()->get('user')->username;
        } else {
            $username = 'NOT FOUND';
        }
        if ($request->session()->has('id')){
            $activity = 'Successfully logout by user with username '.$username;
            $status = 'SUCCESS';
            $log = DB::table('log')->insertGetId([
                'username' => $username,
                'activity' => $activity,
                'status' => $status,
            ]);
            $request->session()->flush();
        }
        return redirect()->route('login');
    }
}
