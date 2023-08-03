<?php

namespace App\Http\Controllers;

use App\Mail\UserForget;
use App\Models\AppoinmentModel;
use App\Models\MedicineBillings;
use App\Models\MedicineOrder;
use App\Models\ResetPassword;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ProfileController extends Controller
{
    function link(){
        $data = User::where('id',Auth::user()->id)->first();
        return view('frontend.profile.index',['data'=>$data]);
    }
    function update(Request $request){
        $request->validate([
            'name' =>'required',
        ]);
        User::find(Auth::user()->id)->update([
            'name'       => $request->name,
            'address'    => $request->address,
            'updated_at' => Carbon::now(),
        ]);
        return back()->with('succ','Profile Updated');
    }
    function password(Request $request){
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required',
            'con_password' => 'required',
        ]);
        if ($request->new_password == $request->con_password) {
            if (Hash::check($request->old_password, Auth::user()->password)) {
                User::find(Auth::user()->id)->update([
                    'password' => bcrypt($request->new_password),
                ]);
                return back()->with('succ','Password Updated');
            }else {
                return back()->with('err','Old Password Not Matching !');
            }
        }else {
            return back()->with('err','New Password Not Matching !');
        }
    }
    function linkOrder(){
        $order = AppoinmentModel::where('user_id',Auth::guard()->user()->id)->paginate(10);
        $medicine = MedicineBillings::where('user_id',Auth::user()->id)->paginate(10);
        return view('frontend.profile.order',[
            'orders'    => $order,
            'medicines' => $medicine,
        ]);
    }

    function forgetCheckup(Request $request){
        if (User::where('email',$request->email)->exists()) {
            $token =uniqid();
            ResetPassword::insert([
                'email' => $request->email,
                'token' => $token,
            ]);
            $data =[
                'email' => $request->email,
                'token' => $token,
            ];
            Mail::to($request->email)->send(new UserForget($data));
            return back()->with('succ','Email sent to your mail !');
        }else{
            return back()->with('err','Email Not Found ! try again');
        }
    }

    function forgetVerify($token){
       if (ResetPassword::where('token',$token)->exists()) {
            $data =  ResetPassword::where('token',$token)->first();
            return view('frontend.auth.change')->with(['data' => $data->email]);
       }else {
        return redirect()->route('reset')->with('err','Code Invalid, Try again!');
       }
    }
    function forgetVerifyChangeConfirme(Request $request){
        $request->validate([
            'email'         => 'required',
            'password'      => 'required',
            'con_password'  => 'required',
        ]);
        if ($request->password == $request->con_password) {
            User::where('email',$request->email)->update([
                'password' => bcrypt($request->password),
            ]);
            //ResetPassword::where('email',$request->email)->delete();
            return back()->with('succ', 'Password Changed Successfully');
        }else {
            return back()->with('err', 'Password not matching');
        }
    }
    // function forgetVerifyChange(){
    //     return view('frontend.auth.change');
    // }

}
