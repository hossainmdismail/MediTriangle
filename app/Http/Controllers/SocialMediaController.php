<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaModel;
use Illuminate\Http\Request;

class SocialMediaController extends Controller
{
    function social(){
        $data = SocialMediaModel::all();
        return view('backend.social.index',['datas' => $data]);
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
