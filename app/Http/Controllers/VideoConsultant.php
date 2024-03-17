<?php

namespace App\Http\Controllers;

use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use App\Models\User;
use App\Models\VideoConsultantModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Photo;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;


class VideoConsultant extends Controller
{


    function link(Request $request){
        $doctor = DoctorModel ::where('status',1)->paginate(10);
        $department = DepartmentModel::where('status',1)->get();
        if ($request->department != null) {
            $doctor = DoctorModel ::where('department_id',$request->department)->paginate(10);
        }
        SEOMeta::setTitle('Video Consultant'); //web title
        SEOTools::setDescription('this is description');
        SEOMeta::addKeyword('this is tags');
        OpenGraph::setTitle('this is seo title');
        SEOMeta::setCanonical('https://meditriangle.com' . request()->getPathInfo());
        return view('frontend.consultant.index',[
            'doctors' => $doctor,
            'department' => $department,
        ]);

    }

    function take($id){
        SEOMeta::setTitle('Apply Video Consuntation'); //web title
        SEOTools::setDescription('this is description');
        SEOMeta::addKeyword('this is tags');
        OpenGraph::setTitle('this is seo title');
        SEOMeta::setCanonical('https://meditriangle.com' . request()->getPathInfo());
        $doctor = DoctorModel::where('id',$id)->first();
        return view('frontend.consultant.form')->with(['doctor' => $doctor]);

    }

    function store(Request $request){
        $order_id ='#OR'.rand(1,5000).'DER'.rand(1,500);
        $request->validate([
            'doctor_id'         => 'required',
            'name'              => 'required',
            'number'            => 'required',
            'gender'            => 'required',
            'age'               => 'required',
            'request_date'      => 'required',
            'report'            => 'required|mimes:pdf',
        ],[
            'report' => 'Report Must Be PDF!',
        ]);
        //Login
        // if (!Auth::check()) {
        //     if (User::where('number',$request->number)->exists()) {
        //         return back()->with('err', 'Number Exists ! Login Please');
        //     }else {
        //         $pass ='RAN'.rand(1,5000).'LOG'.rand(1,500);
        //         User::insert([
        //             'name' => $request->name,
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
        // //login end
        $doctor = DoctorModel::where('id',$request->doctor_id)->first();
        $fee =  $doctor->fee+(($doctor->vat/100)*$doctor->fee);
        $file = $request->file('report');
        $ext = $file->getClientOriginalExtension();
        $name = 'VID' . rand(1, 2000) . 'FILE' . rand(1, 500) . '.' . $ext;
        // Store the file in the 'public/uploads' directory with the generated name
        $path = $file->storeAs('uploads/video', $name, 'public');





        // Photo::upload($request->report,'uploads/video','VID');
       $videoConsult= new VideoConsultantModel();
            $videoConsult->doctor_id         = $request->doctor_id;
            $videoConsult->name              = $request->name;
            $videoConsult->number            = $request->number;
            $videoConsult->gender            = $request->gender;
            $videoConsult->age               = $request->age;
            $videoConsult->expected_date     = $request->request_date;
            $videoConsult->note              = $request->note;
            $videoConsult->fee               = $fee;
            $videoConsult->order_id          = $order_id;
            $videoConsult->prescription      = $name;
            $videoConsult->save();


        // $data = array("id"=>Auth::user()->id, "amount"=>$fee,'order_id'=>$order_id);
        // $data = array("id"=>Auth::user()->id, "amount"=>$fee,'order_id'=>$order_id,'type' => 'video');
        // return redirect()->route('pay')->with('data',$data);
        return redirect(route('thank.you'));
    }
}
