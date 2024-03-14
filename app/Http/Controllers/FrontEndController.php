<?php

namespace App\Http\Controllers;

use App\Models\HealthCard;
use App\Models\HealthCardApplicaton;
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
    function contact(){
        return view('frontend.contact');
    }
    function thankyou(){
        return view('frontend.thankyou');
    }
    function index(){
        $healths = HealthCard::where('status',1)->get()->first();
        return view('frontend.health-card.index',compact('healths'));
    }
    function healthCardStore(Request $request){
        $request->validate([
            'name' => 'required',
            'number' => 'required|numeric|digits:11',
            'address' => 'required',
        ],[
            'name'=>'Please Input Name!',
            'number'=>'Please Input Phone Numebr!',
            'number.numeric'=>'Please Input Numebr Type!',
            'number.digits'=>'Number Should Be 11 Digits!',
            'address'=>'Please Input Address!',
        ]);
        if($request->pass_nid_number){
            $request->validate([
                'pass_nid_number' =>'numeric|digits:10',
            ],[
                'pass_nid_number.numeric'=>'Please Input Numebr Type!',
                'pass_nid_number.digits'=>'Number Should Be 10 Digits!',
            ]);

            $application = new HealthCardApplicaton();
            $application->name = $request->name;
            $application->number = $request->number;
            $application->address = $request->address;
            $application->passport_nid = $request->pass_nid_number;
            $application->status = "PROCESSING";
            $application->save();
            return redirect(route('thank.you'));

        }else{
            $application = new HealthCardApplicaton();
            $application->name = $request->name;
            $application->number = $request->number;
            $application->address = $request->address;
            $application->status = "PROCESSING";
            $application->save();
            return redirect(route('thank.you'));
        }
       return back();
    }

    function hctc(){
        return view('frontend.health-card-terms-and-conditions');
    }
    function privacypolicy(){
        return view('frontend.privacyandpolicy');
    }
}
