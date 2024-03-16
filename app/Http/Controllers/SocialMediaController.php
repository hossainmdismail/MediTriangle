<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SocialMediaModel;
use Illuminate\Support\Facades\Auth;

class SocialMediaController extends Controller
{
    function social(){
        $data = SocialMediaModel::all();
        if (Auth::guard('admin_model')->user()->can('settings')) {
            // Show the view page
            return view('backend.social.index',['datas' => $data]);
        } else {
            return abort(404);
        }
    }
    function socialStore(Request $request){
        $request->validate([
            'icon' => 'required',
            'link' => 'required',
        ]);
        $count = SocialMediaModel::where('status',1)->count();
        SocialMediaModel::insert([
            'icon'   => $request->icon,
            'link'   => $request->link,
            'status' => ($count < 5?1:0) ,
        ]);
        return back()->with('succ','Social Media Added Successfully');
    }
    function socialDelete($id){
        SocialMediaModel::find($id)->delete();
        return back()->with('succ','Delete Successfully');
    }
    function socialEdit(Request $request){
        SocialMediaModel::where('id',$request->id)->update([
            'link' =>$request->link,
        ]);
        return back()->with('succ','Updated');
    }
}
