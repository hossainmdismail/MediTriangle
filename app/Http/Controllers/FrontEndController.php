<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    //Appoinmnet
    function appoinmentLink(){
        return view('frontend.appoinment.index');
    }
    function loginLink(){
        return view('frontend.login');
    }
    function loginAccess(Request $request){
        $request->validate([
            'number'    => 'required',
            'password'  => 'required',
        ]);
        if (Auth::guard()->attempt(['number'=> $request->number,'password'=>$request->password],$request->remember)) {
            return redirect()->route('profile')->with('succ','Successfully logged in');
        }else {
            return back()->with('err','Password not matching');
        }


    }
    function registerLink(){
        return view('frontend.register');
    }
    function registerAccess(Request $request){
        $request->validate([
            'name'      => 'required',
            'email'     => 'required|email',
            'number'    => 'required',
            'password'  => 'required |min:8|max:16',
        ]);
        if (!User::where('email', $request->email)->exists()) {
            User::insert([
                'name'      => $request->name,
                'email'     => $request->email,
                'number'    => $request->number,
                'password'  => bcrypt($request->password),
            ]);
            Auth::guard()->attempt([
                'number'    => $request->number,
                'password'  =>$request->password
            ],$request->remember);
            return redirect()->route('profile')->with('succ','Account Created');
        }else{
            return back()->with('err','Email Already Exists');
        }
    }
    function reset(){
        return view('frontend.auth.reset');
    }
}
