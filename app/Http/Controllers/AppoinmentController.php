<?php

namespace App\Http\Controllers;

use App\Models\AppoinmentModel;
use App\Models\AppoinmentReports;
use App\Models\attendant;
use App\Models\DoctorModel;
use App\Models\User;
use ArrayIterator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;
use MultipleIterator;
use Photo;

class AppoinmentController extends Controller
{
    function appoinmentStore(Request $request){
        $order_id ='#OR'.rand(1,5000).'DER'.rand(1,500);
        if($request->email!= null){
            $request->validate([
                'country_id' => 'required',
                'state_id' => 'required',
                'hospital_id' => 'required',
                'department_id' => 'required',
                'name' => 'required',
                'email' => 'required|email',
                'phone' => 'required|numeric|digits:11',
            ],[
                'phone'=>'Input Phone Number!',
                'email'=>'Input Email!',
                'email.email'=>'Input Valid Email Address!',
                'phone.numeric'=>'Please Input Numebr Type!',
                'phone.digits'=>'Number Should Be 11 Digits!',
            ]);
        }
        else{
            $request->validate([
                'country_id' => 'required',
                'state_id' => 'required',
                'hospital_id' => 'required',
                'department_id' => 'required',
                'name' => 'required',
                'phone' => 'required|numeric|digits:11',
            ],[
                'phone'=>'Input Phone Number!',
                'phone.numeric'=>'Please Input Numebr Type!',
                'phone.digits'=>'Number Should Be 11 Digits!',
            ]);
        }


        $appoinment = new AppoinmentModel();
            $appoinment->country_id = $request->country_id;
            $appoinment->state_id = $request->state_id;
            $appoinment->hospital_id = $request->hospital_id;
            $appoinment->department_id = $request->department_id;
            $appoinment->name = $request->name;
            $appoinment->number = $request->phone;
            $appoinment->email = $request->email? $request->email:null;
            $appoinment->status = "PROCESSING";
            $appoinment->save();

        return redirect(route('thank.you'));
        // //Attendant
        // if ($request->hasFile('attendantPassport')) {
        //     $mi = new MultipleIterator();
        //     $mi->attachIterator(new ArrayIterator($request->attendantName));
        //     $mi->attachIterator(new ArrayIterator($request->attendantPassportNumber));
        //     $mi->attachIterator(new ArrayIterator($request->attendantPassport));
        //     foreach ($mi as list($name, $number, $photo) ) {
        //         $make = $photo;
        //         $extn = $make->getClientOriginalExtension();
        //         $profileName = 'PRO'.rand(1,2000).'FILE'.rand(1,500).'.'. $extn;
        //         attendant::insert([
        //             'user_id' => 1,
        //             'order_id' => $order_id,
        //             'attendant_name' => $name,
        //             'passport_number' => $number,
        //             'passport' => $profileName,
        //         ]);
        //         Image::make($make)->save(public_path('uploads/attendant/'.$profileName));
        //     }
        // }
        //login
        // if (!Auth::check()) {
        //     if (User::where('number',$request->number)->exists()) {
        //         return back()->with('err', 'Number Exists ! Login Please');
        //     }else {
        //         $pass ='RAN'.rand(1,5000).'LOG'.rand(1,500);
        //         User::insert([
        //             'name' => $request->passportname,
        //             'number' => $request->newNumber,
        //             'email' => $request->email,
        //             'password' => bcrypt($pass),
        //             'created_at' => Carbon::now(),
        //         ]);
        //         Auth::guard()->attempt(['number'=> $request->number,'password'=>$pass]);

        //         // SMS
        //         $url = "http://bulksmsbd.net/api/smsapi";
        //         $api_key = "5Ga7wUBj70JdpiqVhe8t";
        //         $senderid = "8809617611020";
        //         $number = $request->number;
        //         $message = 'Your Password is : '.$pass;

        //         $data = [
        //             "api_key" => $api_key,
        //             "senderid" => $senderid,
        //             "number" => $number,
        //             "message" => $message
        //         ];
        //         $ch = curl_init();
        //         curl_setopt($ch, CURLOPT_URL, $url);
        //         curl_setopt($ch, CURLOPT_POST, 1);
        //         curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        //         curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //         curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        //         $response = curl_exec($ch);
        //         curl_close($ch);
        //     }
        // }
        // Photos
        // if ($request->hasFile('report')) {
        //     $file = $request->report;
        //     $data = null;
        //     foreach ($file as $value) {
        //         $make = $value;
        //         $extn = $make->getClientOriginalExtension();
        //         $profileName = 'PRO'.rand(1,2000).'FILE'.rand(1,500).'.'. $extn;
        //         $data .= $profileName;
        //         Image::make($make)->save(public_path('uploads/report/'.$profileName));

        //         AppoinmentReports::insert([
        //             'order_id' => $order_id,
        //             'reports' => $profileName,
        //             'created_at' => Carbon::now(),
        //         ]);
        //     }
        // }
        // Photo::upload($request->passport,'uploads/passport','PASSP');
        // AppoinmentModel::insert([
        //     'user_id' => 17,
        //     'country_id' => $request->country_id,
        //     'appointment_type' => $request->appointment_type,
        //     'state_id' => $request->state_id,
        //     'hospital_id' => $request->hospital_id,
        //     'department_id' => $request->department_id,
        //     'doctor_id' => $request->doctor_id,
        //     'appoinment_date' => $request->appoinment_date,
        //     'number' => $request->number,
        //     'passportname' => $request->passportname,
        //     'passportnumber' => $request->passportnumber,
        //     'gender' => $request->gender,
        //     'note' => $request->note,
        //     'fee' => $request->fee,
        //     'passport' => Photo::$name,
        //     'order_id' => $order_id,
        //     'age' => $request->age,
        //     'created_at' => Carbon::now(),
        // ]);
        // $data = array("id"=>17, "amount"=>$request->fee,'order_id'=>$order_id,'type' => 'appointment');
        // return redirect()->route('pay')->with('data',$data);
    }

    function appoinmentStoreDone(){
        return view('frontend.appoinment.personal');
    }
}
