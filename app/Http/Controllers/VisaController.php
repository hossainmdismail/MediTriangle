<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\VisaModel;
use App\Models\VisaModelResport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Photo;
use Image;
class VisaController extends Controller
{
    function visaLink(){
        return view('frontend.visa.index');
    }
    function visaStore(Request $request){
        $order_id ='#OR'.rand(1,5000).'DER'.rand(1,500);
        $fee = 2500;
        $request->validate([
            'country_id'        => 'required',
            'state_id'          => 'required',
            'hospital_id'       => 'required',
            'department_id'     => 'required',
            'doctor_id'         => 'required',
            'name'              => 'required',
            'number'            => 'required',
            'email'             => 'required',
            'visaType'          => 'required',
            'embassy'           => 'required',
            'request_date'      => 'required',
            'passport'          => 'required|image|mimes:jpeg,png,jpg,gif',
        ]);
        //Login
        if (!Auth::check()) {
            if (User::where('number',$request->number)->exists()) {
                return back()->with('err', 'Number Exists ! Login Please');
            }else {
                $pass ='RAN'.rand(1,5000).'LOG'.rand(1,500);
                User::insert([
                    'name' => $request->name,
                    'number' => $request->newNumber,
                    'email' => $request->newEmail,
                    'password' => bcrypt($pass),
                    'created_at' => Carbon::now(),
                ]);
                Auth::guard()->attempt(['number'=> $request->number,'password'=>$pass]);

                // SMS
                $url = "http://bulksmsbd.net/api/smsapi";
                $api_key = "5Ga7wUBj70JdpiqVhe8t";
                $senderid = "8809617611020";
                $number = $request->number;
                $message = 'Your Password is : '.$pass;

                $data = [
                    "api_key" => $api_key,
                    "senderid" => $senderid,
                    "number" => $number,
                    "message" => $message
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
            }
        }
        //login end

        if ($request->hasFile('prescription')) {
            $file = $request->prescription;
            $data = null;
            foreach ($file as $value) {
                $make = $value;
                $extn = $make->getClientOriginalExtension();
                $profileName = 'PRO'.rand(1,2000).'FILE'.rand(1,500).'.'. $extn;
                $data .= $profileName;
                Image::make($make)->save(public_path('uploads/visareport/'.$profileName));

                VisaModelResport::insert([
                    'order_id' => $order_id,
                    'reports' => $profileName,
                    'created_at' => Carbon::now(),
                ]);
            }
        } else {
            return back()->with('err', 'Prescription Input is Blank');
        }

        Photo::upload($request->passport,'uploads/visa','VIS');
        VisaModel::insert([
            'country_id'        => $request->country_id,
            'state_id'        => $request->state_id,
            'hospital_id'        => $request->hospital_id,
            'department_id'        => $request->department_id,
            'doctor_id'        => $request->doctor_id,
            'name'              => $request->name,
            'number'            => $request->number,
            'email'             => $request->email,
            'order_id'          => $order_id,
            'visa_id'          => $request->visaType,
            'embassy_id'           => $request->embassy,
            'expected_date'      => $request->request_date,
            'passport'            => Photo::$name,
            'note'            => $request->note,
        ]);

        // $data = array("id"=>Auth::user()->id, "amount"=>$fee,'order_id'=>$order_id);
        $data = array("id"=>Auth::user()->id, "amount"=>$fee,'order_id'=>$order_id,'type' => 'visa');
        return redirect()->route('pay')->with('data',$data);
    }
}
