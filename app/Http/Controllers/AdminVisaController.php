<?php

namespace App\Http\Controllers;

use App\Models\VisaModel;
use App\Models\DoctorModel;
use Illuminate\Http\Request;
use App\Models\VisaModelResport;
use Illuminate\Support\Facades\Auth;
use App\Models\VideoConsultAttendant;

class AdminVisaController extends Controller
{
    function visa(Request $request){
            $data = VisaModel::orderBy('id','DESC')
            ->when($request->date != null,function($query) use ($request){
                return $query->whereDate('created_at',$request->date);
            })
            ->when($request->select != null, function ($query) use ($request){
                return $query->where('status',$request->select);
            })
            ->paginate(10)
            ->withQueryString();
            if (Auth::guard('admin_model')->user()->can('visa_invitation')){
                return view('backend.data.visa.index',['datas' => $data]);
            }else{
                return abort(404);
            }

    }

    function visaWatch($id){
        VisaModel::find($id)->update([
            'notifications'  =>  1,
        ]);
       $data = VisaModel::where('id',$id)->first();
       $datas = VisaModel::where('id',$id)->first();
       $doctor = DoctorModel::where('id',$data->doctor_id)->first();
       $visaReports = VisaModelResport::where('order_id',$data->order_id)->get();
       $attendants = VideoConsultAttendant::where('order_id',$data->order_id)->get();

       if (Auth::guard('admin_model')->user()->can('visa_invitation')){
        return view('backend.data.visa.watch',[
            'data'       =>  $data,
            'datas'       =>  $datas,
            'doctor'      =>  $doctor,
            'visa'        =>  $visaReports,
            'attendants'        =>  $attendants,
            ]);
    }else{
        return abort(404);
    }

    }

    function visaInvitaion(Request $request){
        $data = AppoinmentModel::orderBy('id','DESC')
            ->when($request->date != null,function($query) use ($request){
                return $query->whereDate('created_at',$request->date);
            })
            ->when($request->select != null, function ($query) use ($request){
                return $query->where('status',$request->select);
            })
            ->where('appointment_type',3)
            ->paginate(10)
            ->withQueryString();

        return view('backend.data.visa.index',['datas' => $data]);
        // $data = AppoinmentModel::orderBy('id', 'DESC')->where('appointment_type',3)->paginate(10);
        // return view('backend.data.visa.index',['datas' => $data]);
    }

    function visaConfirmation(Request $request){
        $request->validate([
            'order_id'  =>'required',
            'message'   =>'required',
            'btn'       =>'required',
        ]);
        if ($request->btn == 1) {
            $request->validate([
                'date' =>'required',
                'time' =>'required',
            ]);
            if (VisaModel::where('order_id',$request->order_id)->exists()) {
                VisaModel::where('order_id',$request->order_id)->update([
                    'appointment_date'      => $request->date,
                    'message'       => $request->message,
                    'order_status'  => 1,
                ]);
                $message = 'Accepted ,'.'appointment date :'. $request->date.'. Note :'.$request->message;
                // SMS

                // $url = env('SMS_URL');
                // $api_key = env('SMS_API_KEY');
                // $senderid = env('SMS_SENDER_ID');
                // $number = $request->number;
                // $message = $message;

                // $data = [
                //     "api_key" => $api_key,
                //     "senderid" => $senderid,
                //     "number" => $number,
                //     "message" => $message
                // ];
                // $ch = curl_init();
                // curl_setopt($ch, CURLOPT_URL, $url);
                // curl_setopt($ch, CURLOPT_POST, 1);
                // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                // $response = curl_exec($ch);
                // curl_close($ch);
                return back()->with('succ','Order Confirmed');
            }else {
                return back()->with('err','Something is wrong');
            }
        }
        elseif ($request->btn == 2) {
            VisaModel::where('order_id',$request->order_id)->update([
                'message' => $request->message,
                'order_status' => 2,
            ]);
            $message = 'Cancaled ,'.'. Note :'.$request->message;
            // SMS

            // $url = env('SMS_URL');
            // $api_key = env('SMS_API_KEY');
            // $senderid = env('SMS_SENDER_ID');
            // $number = $request->number;
            // $message = $message;

            // $data = [
            //     "api_key" => $api_key,
            //     "senderid" => $senderid,
            //     "number" => $number,
            //     "message" => $message
            // ];
            // $ch = curl_init();
            // curl_setopt($ch, CURLOPT_URL, $url);
            // curl_setopt($ch, CURLOPT_POST, 1);
            // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            // $response = curl_exec($ch);
            // curl_close($ch);
            return back()->with('succ','Order Canceled');
        }
    }
}
