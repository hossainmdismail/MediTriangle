<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\ServiceModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    function service(){
        $data = ServiceModel::all();
        if (Auth::guard('admin_model')->user()->can('settings')) {
            // Show the view page
            return view('backend.service.index',['datas' => $data]);
        } else {
            return abort(404);
        }
    }
    function serviceStore(Request $request){
        $math = ServiceModel::count();
        $request->validate([
            'icon'              => 'required',
            'service'           => 'required',
            'short_description' => 'required',
        ],[
            'icon' =>'Please Select Icon !!',
        ]);
        ServiceModel::insert([
            'icon'              => $request->icon,
            'service'           => $request->service,
            'short_description' => $request->short_description,
            'description'       => $request->description,
            'status'            => ($math >= 6 ?0:1),
            'created_at'        => Carbon::now(),
        ]);
        return back()->with('succ', 'Added Successfully');
    }
    function serviceDelete($id){
        ServiceModel::find($id)->delete();
        return back()->with('succ', 'Delete Successfully !');
    }
    function serviceEdit(Request $request){
        $request->validate([
            'id'                => 'required',
            'service'           => 'required',
            'short_description' => 'required',
        ]);
        if ($request->id !=null) {
            ServiceModel::where('id',$request->id)->update([
                'service'           => $request->service,
                'short_description' => $request->short_description,
                'description'       => $request->description,
                'status'            => $request->status,
                'updated_at'        => Carbon::now(),
            ]);
            return back()->with('succ','Updated Successfully');
        }else {
            return back()->with('err','Invalid data try again !');
        }
    }
}
