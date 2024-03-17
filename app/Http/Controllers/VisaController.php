<?php

namespace App\Http\Controllers;

use Image;
use Photo;
use ArrayIterator;
use Carbon\Carbon;
use App\Models\User;
use App\Models\VideoConsultAttendant;
use MultipleIterator;
use App\Models\VisaModel;
use Illuminate\Http\Request;
use App\Models\VisaModelResport;
use Illuminate\Support\Facades\Auth;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class VisaController extends Controller
{
    function visaLink(){
        SEOMeta::setTitle('Visa'); //web title
        SEOTools::setDescription('this is description');
        SEOMeta::addKeyword('this is tags');
        OpenGraph::setTitle('this is seo title');
        SEOMeta::setCanonical('https://meditriangle.com' . request()->getPathInfo());
        return view('frontend.visa.index');
    }
    function visaStore(Request $request){


        $order_id ='#OR'.rand(1,5000).'DER'.rand(1,500);
        $fee = 2500;
        $request->validate([
            'name'              => 'required',
            'phone'            => 'required',
            'email'             => 'required',
            'passport'          => 'required|image|mimes:jpeg,png,jpg,gif',
            'prescription'      => 'required|mimes:pdf|max:10000',

        ],[
            'prescription' => 'Report Must Be PDF!',
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
        //             'email' => $request->newEmail,
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
        //login end
        $file = $request->file('prescription');
        $ext = $file->getClientOriginalExtension();
        $name = 'PRO' . rand(1, 2000) . 'FILE' . rand(1, 500) . '.' . $ext;
        // Store the file in the 'public/uploads' directory with the generated name
        $path = $file->storeAs('uploads/visareport', $name, 'public');
        VisaModelResport::insert([
            'order_id' => $order_id,
            'reports' => $name,
            'created_at' => Carbon::now(),
        ]);

        // //Attendant
        if ($request->attendantName) {
            $request->validate([
                'attendantName.*' => 'required',
                'attendantPassportNumber.*' => 'required',
                'attendantPassport.*' => 'required|mimes:jpeg,png,jpg',
            ]);

            // dd($request->attendantPassport);
            $mi = new MultipleIterator();
            $mi->attachIterator(new ArrayIterator($request->attendantName));
            $mi->attachIterator(new ArrayIterator($request->attendantPassportNumber));
            $mi->attachIterator(new ArrayIterator($request->attendantPassport));
            foreach ($mi as list($name, $number, $photo) ) {
                $make = $photo;
                $extn = $make->getClientOriginalExtension();
                $profileName = 'PRO'.rand(1,2000).'FILE'.rand(1,500).'.'. $extn;
                 $attendant = new VideoConsultAttendant();
                    $attendant->order_id  = $order_id;
                    $attendant->name  = $name;
                    $attendant->number  = $number;
                    $attendant->passport  = $profileName;
                    $attendant->save();

                Image::make($make)->save(public_path('uploads/attendant/'.$profileName));
            }
        }

        Photo::upload($request->passport,'uploads/visa','VIS');
        VisaModel::insert([
            'name'              => $request->name,
            'number'            => $request->phone,
            'email'             => $request->email,
            'order_id'          => $order_id,
            'passport'           => Photo::$name,
            'created_at'         => Carbon::now(),
        ]);
         return redirect(route('thank.you'));
        // $data = array("id"=>Auth::user()->id, "amount"=>$fee,'order_id'=>$order_id);
        // $data = array("id"=>Auth::user()->id, "amount"=>$fee,'order_id'=>$order_id,'type' => 'visa');
        // return redirect()->route('pay')->with('data',$data);
    }
}
