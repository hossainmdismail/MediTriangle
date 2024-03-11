<?php

namespace App\Http\Controllers;

use App\Models\BannnerModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;
class BannnerController extends Controller
{
    function banner(){
        $data = BannnerModel::all();
        return view('backend.banner.index',['datas' => $data]);
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
