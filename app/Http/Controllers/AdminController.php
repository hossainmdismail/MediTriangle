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
    function register_2(){
        $admin = AdminModel::all();
        if($admin->count() == 0){
            return view('backend.auth.register_2');
        }else{
            return view('backend.auth.login');
        }
    }
    function registerLink(){
        if (Auth::guard('admin_model')->user()->can('user')) {
            // Show the view page
            return view('backend.auth.register');

        } else {
            return abort(404);
        }
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
    // Store Data
    function register2(Request $request){

        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'password'  => 'required',
        ]);

            AdminModel::insert([
                'name'      => $request->name,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
                'role'      => 1,
                'created_at' =>Carbon::now(),
            ]);
            return back();

    }

    //Logout
    function logout(){
        Auth::guard('admin_model')->logout();
        return redirect('/');
    }
}

