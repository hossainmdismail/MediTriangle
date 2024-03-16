<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\BannnerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BannnerController extends Controller
{
    function banner(){
        $data = BannnerModel::all();
        if (Auth::guard('admin_model')->user()->can('settings')) {
            // Show the view page
            return view('backend.banner.index',['datas' => $data]);

        } else {
            return abort(404);
        }
    }
    function bannerStore(Request $request){
        // BannnerModel::where('status',1)->update([
        //     'status' => 0,
        // ]);
        $request->validate([
            'photo' => 'required',
        ]);

        $photo = $request->photo;
        $extn = $photo->getClientOriginalExtension();
        $profileName = 'PRO'.rand(1,2000).'FILE'.rand(1,500).'.'. $extn;
        Image::make($photo)->save(public_path('uploads/banner/'.$profileName));

        BannnerModel::create([
            'image' => $profileName,

            'created_at' => Carbon::now(),
        ]);
        return back()->with('succ', 'Added Successfully');
    }
    function bannerDelete($id){
        $delPhoto = BannnerModel::where('id',$id)->first()->image;
        $path = public_path('uploads/banner/'.$delPhoto);
        unlink($path);
        BannnerModel::find($id)->delete();
        return back()->with('succ', 'Delete Successfully !');
    }
    function bannerEdit(Request $request){



        if ($request->id !=null) {
            // if ($request->status == 1) {
            //     BannnerModel::where('status',1)->update([
            //         'status' => 0,
            //     ]);
            // }
            if ($request->photo != null) {
                $delPhoto = BannnerModel::where('id',$request->id)->first()->image;
                $path = public_path('uploads/banner/'.$delPhoto);
                unlink($path);
                $photo = $request->photo;
                $extn = $photo->getClientOriginalExtension();
                $profileName = 'PRO'.rand(1,2000).'FILE'.rand(1,500).'.'. $extn;
                Image::make($photo)->save(public_path('uploads/banner/'.$profileName));

                BannnerModel::where('id',$request->id)->update([
                    'image' => $profileName,
                ]);
            }
            BannnerModel::where('id',$request->id)->update([
                'name' => strtoupper($request->name),
                'title' => $request->title,
                'status' => $request->status,
                'updated_at' => Carbon::now(),
            ]);
            return back()->with('succ','Updated Successfully');
        }else {
            return back()->with('err','Invalid data, try again !');
        }
    }
}
