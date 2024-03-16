<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\OwnerModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OwnerController extends Controller
{
    function ownerLink(){
        $data = OwnerModel::orderBy('id', 'DESC')->paginate(10);
        if (Auth::guard('admin_model')->user()->can('settings')) {
            // Show the view page
            return view('backend.owner.index',[
                'datas' => $data,
            ]);
        } else {
            return abort(404);
        }

    }
    function ownerStore(Request $request){
        $count = OwnerModel::where('status',1)->count();
        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'address'   => 'required',
            'landline'  => 'required|max:10',
            'number'    => 'required|max:10',
        ]);
        OwnerModel::insert([
            'name'          => $request->name,
            'email'         => $request->email,
            'address'       => $request->address,
            'number'        => $request->number,
            'status'        => ($count < 1?1:0) ,
            'landline'      => $request->landline,
            'created_at'    => Carbon::now(),
        ]);
        return back()->with('succ','Successfully Done');
    }
    function ownerEdit($id){
        $data = OwnerModel::where('id',$id)->first();
        if (Auth::guard('admin_model')->user()->can('settings')) {
            // Show the view page

            return view('backend.owner.edit',['data'=>$data]);
        } else {
            return abort(404);
        }
    }
    function ownerUpdate(Request $request){
        $request->validate([
            'name'      => 'required',
            'email'     => 'required',
            'address'   => 'required',
            'landline'  => 'required|max:10',
            'number'    => 'required|max:10',
        ]);
        OwnerModel::where('id',$request->id)->update([
            'name'      =>$request->name,
            'email'     =>$request->email,
            'number'    =>$request->number,
            'landline'  =>$request->landline,
            'address'   =>$request->address,
        ]);
        return redirect()->route('owner.link')->with('succ','Updated Successfully');
    }
    function delete($id){
        OwnerModel::find($id)->delete();
        return back()->with('delete', 'Data Deleted Successfully');
    }
}
