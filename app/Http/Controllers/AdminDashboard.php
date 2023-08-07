<?php

namespace App\Http\Controllers;

use App\Models\AppoinmentModel;
use App\Models\AppoinmentReports;
use App\Models\DoctorModel;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminDashboard extends Controller
{
    function dashboard(){
        $patientHistory = DB::table('appoinment_models')->select(
            DB::raw('DATE_FORMAT(created_at, "%M") as month'),
            DB::raw('COUNT(gender) as total'),
            DB::raw('SUM(CASE WHEN gender = "male" THEN 1 ELSE 0 END) as male'),
            DB::raw('SUM(CASE WHEN gender = "female" THEN 1 ELSE 0 END) as female'))
            ->whereYear('created_at',2023)
            ->orderBy('created_at','ASC')
            ->groupBy('month')
            ->get();

        $chart_data = [];
        foreach($patientHistory as $data) {
            $chart_data[] = [
                'month' => $data->month,
                'male' => $data->male,
                'female' => $data->female
            ];
        }
        $chart = [
            'chart' => [
                'type' => 'bar',
                'height' => 350
            ],
            'series' => [
                [
                    'name' => 'Male',
                    'data' => array_column($chart_data, 'male')
                ],
                [
                    'name' => 'Female',
                    'data' => array_column($chart_data, 'female')
                 ]
            ],
            'xaxis' => [
                'categories' => array_column($chart_data, 'month')
            ]
        ];
        // return $response;
        $user               = User::all()->count();
        $patient            = AppoinmentModel::all()->count();
        $notificationsCount = AppoinmentModel::where('notifications',0);
        $totalAppointment   = AppoinmentModel::where('appointment_type',1)->count();
        $totalEarn          = AppoinmentModel::sum('fee');

        // return $notificationsCount->orderBy('id', 'DESC')->first()->passportname;
        // dd($notificationsCount);
        return view('backend.index',[
            'user'                  => $user,
            'patient'               => $patient,
            'notificationsCount'    => $notificationsCount,
            'totalAppointment'      => $totalAppointment,
            'totalEarn'             => $totalEarn,
            'data'                  => json_encode($chart),
        ]);
    }
    function appointment(Request $request){
            $data = AppoinmentModel::orderBy('id','DESC')
            ->when($request->date != null,function($query) use ($request){
                return $query->whereDate('created_at',$request->date);
            })
            ->when($request->select != null, function ($query) use ($request){
                return $query->where('status',$request->select);
            })
            ->where('appointment_type',1)
            ->paginate(10)
            ->withQueryString();
        // if ($request->select != '') {
        //     $data = AppoinmentModel::orderBy('id', 'DESC')
        //     ->where('appointment_type',1)
        //     ->where('status',$request->select)
        //     ->paginate(2);
        // }else{
        //     $data = AppoinmentModel::orderBy('id', 'DESC')
        //     ->where('appointment_type',1)
        //     ->paginate(10);
        // }

        return view('backend.data.appointment.index',['datas' => $data]);
    }
    function videoInvitaion(Request $request){
        $data = AppoinmentModel::orderBy('id','DESC')
            ->when($request->date != null,function($query) use ($request){
                return $query->whereDate('created_at',$request->date);
            })
            ->when($request->select != null, function ($query) use ($request){
                return $query->where('status',$request->select);
            })
            ->where('appointment_type',2)
            ->paginate(10)
            ->withQueryString();

        return view('backend.data.video.index',['datas' => $data]);

        // $data = AppoinmentModel::orderBy('id', 'DESC')->where('appointment_type',2)->paginate(10);
        // return view('backend.data.video.index',['datas' => $data]);
    }
    function appointmentWatch($id){
        AppoinmentModel::find($id)->update([
            'notifications'  =>  1,
        ]);
       $data = AppoinmentModel::where('id',$id)->first();
       $doctor = DoctorModel::where('id',$data->doctor_id)->first();
       $payment = DB::table('orders')->where('order_id',$data->order_id)->first()->status;
       return view('backend.data.appointment.watch',[
        'datas'       =>  $data,
        'doctor'      =>  $doctor,
        'payment'     =>  $payment,
        ]);
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
    function appointmentConfirmation(Request $request){
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
            if (AppoinmentModel::where('order_id',$request->order_id)->exists()) {
                AppoinmentModel::where('order_id',$request->order_id)->update([
                    'status'        => 1,
                    'activity'      => $request->date,
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
            AppoinmentModel::where('order_id',$request->order_id)->update([
                'status' => 2,
                'message' => $request->message,
                'order_status' => 0,
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
