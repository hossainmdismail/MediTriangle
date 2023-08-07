<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //All Links
    function loginLink(){
        if (Auth::guard('admin_model')->check()) {
            return redirect()->route('admin.dashboard');
        }
        return view('backend.auth.login');

    }
    function registerLink(){
        return view('backend.auth.register');
    }

    //Login Authorize
    function login(Request $request){
        if (Auth::guard('admin_model')->attempt(['email' => $request->email, 'password' => $request->password],true)) {
            return redirect()->route('admin.dashboard');
        }else {
            return back()->with('error','Something is wrong !');
        }
    }

    // Store Data
    function register(Request $request){
        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
        ]);
        if (!AdminModel::where('email',$request->email)->exists()) {
            AdminModel::insert([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
                'role'      => 1,
                'created_at' =>Carbon::now(),
            ]);
            return back();
        }else{
            return back()->with('error' , 'That email address is already registered. You sure you don\'t have an account?');
        }
    }

    //Logout
    function logout(){
        Auth::guard('admin_model')->logout();
        return redirect('/');
    }
}

