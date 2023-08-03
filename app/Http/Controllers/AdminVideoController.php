<?php

namespace App\Http\Controllers;

use App\Models\DoctorModel;
use App\Models\VideoConsultantModel;
use Illuminate\Http\Request;

class AdminVideoController extends Controller
{
function video(Request $request){
        $data = VideoConsultantModel::orderBy('id','DESC')
        ->when($request->date != null,function($query) use ($request){
            return $query->whereDate('created_at',$request->date);
        })
        ->when($request->select != null, function ($query) use ($request){
            return $query->where('status',$request->select);
        })
        ->paginate(10)
        ->withQueryString();
    return view('backend.data.video.index',['datas' => $data]);
}

function videoWatch($id){
    // VisaModel::find($id)->update([
    //     'notifications'  =>  1,
    // ]);
   $data = VideoConsultantModel::where('id',$id)->first();
   $doctor = DoctorModel::where('id',$data->doctor_id)->first();
    // $visaReports = VisaModelResport::where('order_id',$data->order_id)->get();

   return view('backend.data.video.watch',[
    'datas'       =>  $data,
    'doctor'      =>  $doctor,
    ]);
}

function videoConfirmation(Request $request){
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
        if (VideoConsultantModel::where('order_id',$request->order_id)->exists()) {
            VideoConsultantModel::where('order_id',$request->order_id)->update([
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
        VideoConsultantModel::where('order_id',$request->order_id)->update([
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
