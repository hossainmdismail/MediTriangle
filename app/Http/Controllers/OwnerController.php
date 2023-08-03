<?php

namespace App\Http\Controllers;

use App\Models\OwnerModel;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    function ownerLink(){
        $data = OwnerModel::orderBy('id', 'DESC')->paginate(10);
        return view('backend.owner.index',[
            'datas' => $data,
        ]);
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
        return view('backend.owner.edit',['data'=>$data]);
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
