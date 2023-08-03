<?php

namespace App\Http\Controllers;

use App\Models\MedicineBillings;
use App\Models\MedicineOrder;
use App\Models\User;
use ArrayIterator;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use MultipleIterator;
use Image;
class MedicineController extends Controller
{
    function link(){
        return view('frontend.medicine.index');
    }
    function store(Request $request){
        $request->validate([
            'medicine'  => 'required',
            'quantity'  => 'required',
            'address'   => 'required',
            'name'      => 'required',
            'mobile'    => 'required',
            'number'    => (!Auth::check()?'required':''),
        ]);
        //validation for multi input
        if ($request->medicine[0] == null || $request->quantity[0] == null) {
            return back()->with('validate','Input Required');
        }
        //Register if not login
        if (!Auth::check()) {
            if (User::where('number',$request->number)->exists()) {
                return back()->with('err', 'Number Exists ! Login Please');
            }else {
                $pass ='RAN'.rand(1,5000).'LOG'.rand(1,500);
                User::insert([
                    'name'       => $request->passportname,
                    'number'     => $request->number,
                    'email'      => $request->email,
                    'password'   => bcrypt($pass),
                    'created_at' => Carbon::now(),
                ]);
                Auth::guard()->attempt([
                    'number'    => $request->number,
                    'password'  =>$pass
                ]);

                // SMS
                $url = "http://bulksmsbd.net/api/smsapi";
                $api_key = "5Ga7wUBj70JdpiqVhe8t";
                $senderid = "8809617611020";
                $number = $request->number;
                $message = 'Your Password is : '.$pass;

                $data = [
                    "api_key"   => $api_key,
                    "senderid"  => $senderid,
                    "number"    => $number,
                    "message"   => $message
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
        //variables
        $order_id = '#AT'.date('md').'ID'.Auth()->user()->id.'S'. rand(100,1000);
        $report = null ;

        //Reports File Making
        if ($request->report != '') {
            $image = $request->report;
            $extn = $image->getClientOriginalExtension();
            $profileName = 'RE'.rand(1,2000).'PORT'.rand(1,500).'.'. $extn;
            $report = $profileName;
            Image::make($image)->save(public_path('uploads/medicine/'.$profileName));
        }
        //Insert billing informations
        MedicineBillings::insert([
            'user_id'    => Auth::user()->id,
            'order_id'   => $order_id,
            'name'       => $request->name,
            'number'     => $request->mobile,
            'reports'    => $request->report != ''?$report:null,
            'address'    => $request->address,
            'created_at' => Carbon::now(),
        ]);
        //Insert Medicine informations
        $mi = new MultipleIterator();
        $mi->attachIterator(new ArrayIterator($request->medicine));
        $mi->attachIterator(new ArrayIterator($request->quantity));
        foreach ($mi as list($value, $value2) ) {
            MedicineOrder::insert([
                'user_id'       => Auth::user()->id,
                'order_id'      => $order_id,
                'medicine'      => $value,
                'quantity'      => $value2,
                'created_at'    => Carbon::now(),
            ]);
        }
        return back()->with('succ', 'Order Complete');
    }
}
