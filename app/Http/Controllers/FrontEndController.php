<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontEndController extends Controller
{
    //Appoinmnet
    function appoinmentLink(){
        abort(404);
        die();
        return view('frontend.appoinment.index');
    }
    function loginLink(){
        return view('frontend.login');
    }
    function loginAccess(Request $request){
        $request->validate([
            'number' => 'required',
            'password' => 'required',
        ]);
        Auth::guard()->attempt(['number'=> $request->number,'password'=>$request->password],$request->remember);
        return redirect()->route('profile');
    }
}
