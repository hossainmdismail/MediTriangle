<?php

namespace App\Http\Controllers;

use App\Models\AppoinmentModel;
use App\Models\MedicineBillings;
use App\Models\MedicineOrder;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
    // function forget(){
    //     return view('frontend.auth.reset');
    // }
    // function forgetCheckup(Request $request){
    //     $number = $request->number;
    //     $data = User::where('number',$request->number)->first()->id;
    //     if (strlen($number) <= 11) {
    //         $request->validate(['number' => 'required']);
    //         if (User::where('number',$request->number)->exists()) {
    //             // $reset_id = rand(100000,200000);
    //             // User::where('number',$number)->update(['reset_id' => $reset_id]);
    //             // SMS
    //             // $url = env('SMS_URL');
    //             // $api_key = env('SMS_API_KEY');
    //             // $senderid = env('SMS_SENDER_ID');
    //             // $number = $number;
    //             // $message = 'Your Pass Code is : '.$reset_id;

    //             // $data = [
    //             //     "api_key" => $api_key,
    //             //     "senderid" => $senderid,
    //             //     "number" => $number,
    //             //     "message" => $message
    //             // ];
    //             // $ch = curl_init();
    //             // curl_setopt($ch, CURLOPT_URL, $url);
    //             // curl_setopt($ch, CURLOPT_POST, 1);
    //             // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    //             // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //             // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    //             // $response = curl_exec($ch);
    //             // curl_close($ch);
    //             return view('frontend.auth.verify',['data'=> $data]);
    //         }else {
    //             return back()->with('err', 'No record Found !');
    //         }
    //     }else{
    //         return back()->with('err', 'Invalid Number !');
    //     }
    // }
    // // Link
    // function forgetCheckupVerify(){
    //     return view('frontend.auth.verify');
    // }
    // function forgetVerifyConfirme(Request $request){
    //     $codes = User::where('id',$request->id)->first()->reset_id;
    //     $request->validate(['code'=>'required']);
    //     if ($codes == $request->code) {
    //         return back()->with('succ','Invalid Code, Try Again !');
    //     }else {
    //         return back()->with('err','Invalid Code, Try Again !');
    //     }
    // }
    // function forgetVerifyChange(){
    //     return view('frontend.auth.change');
    // }

}
