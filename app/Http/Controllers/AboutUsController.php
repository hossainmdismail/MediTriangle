<?php

namespace App\Http\Controllers;

use Image;
use Carbon\Carbon;
use App\Models\AboutModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AboutUsController extends Controller
{
    function about(){
        $data = AboutModel::all();
        if (Auth::guard('admin_model')->user()->can('settings')) {
            // Show the view page

            return view('backend.about.index',['datas' => $data]);
        } else {
            return abort(404);
        }
    }
    function aboutStore(Request $request){
        AboutModel::where('status',1)->update([
            'status' => 0,
        ]);
        $request->validate([
            'photo'         => 'required',
            'title'         => 'required',
            'description'   => 'required',
        ]);

        $photo = $request->photo;
        $extn = $photo->getClientOriginalExtension();
        $profileName = 'PRO'.rand(1,2000).'FILE'.rand(1,500).'.'. $extn;
        Image::make($photo)->resize('500','500')->save(public_path('uploads/about/'.$profileName));

        AboutModel::insert([
            'photo'         => $profileName,
            'title'         => $request->title,
            'description'   => $request->description,
            'created_at'    => Carbon::now(),
        ]);
        return back()->with('succ', 'Added Successfully');
    }
    function aboutDelete($id){
        $delPhoto = AboutModel::where('id',$id)->first()->photo;
        $path = public_path('uploads/about/'.$delPhoto);
        unlink($path);
        AboutModel::find($id)->delete();
        return back()->with('succ', 'Delete Successfully !');
    }
    function aboutEdit(Request $request){

        $request->validate([
            'id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        if ($request->id !=null) {
            if ($request->status == 1) {
                AboutModel::where('status',1)->update([
                    'status' => 0,
                ]);
            }
            if ($request->photo != null) {
                $delPhoto = AboutModel::where('id',$request->id)->first()->photo;
                $path = public_path('uploads/about/'.$delPhoto);
                unlink($path);
                $photo = $request->photo;
                $extn = $photo->getClientOriginalExtension();
                $profileName = 'PRO'.rand(1,2000).'FILE'.rand(1,500).'.'. $extn;
                Image::make($photo)->resize('500','500')->save(public_path('uploads/about/'.$profileName));

                AboutModel::where('id',$request->id)->update([
                    'photo' => $profileName,
                ]);
            }
            AboutModel::where('id',$request->id)->update([
                'title'         => $request->title,
                'description'   => $request->description,
                'status'        => $request->status,
                'updated_at'    => Carbon::now(),
            ]);
            return back()->with('succ','Updated Successfully');
        }else {
            return back()->with('err','Invalid data, try again !');
        }
    }
}
