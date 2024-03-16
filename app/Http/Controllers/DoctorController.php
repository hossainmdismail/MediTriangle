<?php

namespace App\Http\Controllers;

use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class DoctorController extends Controller
{
    function doctorLink(){
        if (Auth::guard('admin_model')->user()->can('doctors')) {
            // Show the view page
            return view('backend.doctor.index');
        } else {
            return abort(404);
        }


    }
    function doctorStore(Request $request){
        $request->validate([
            'country_id'    => 'required',
            'state_id'      => 'required',
            'hospital_id'   => 'required',
            'department_id' => 'required',
            'name'          => 'required',
            'career_title'  => 'required',
            'speciality'    => 'required',
            'fee'           => 'required',
            'vat'           => 'required',
            'profile'       => 'required',
        ]);
        $make = $request->profile;
        $extn = $make->getClientOriginalExtension();
        $profileName = 'PRO'.rand(1,2000).'FILE'.rand(1,500).'.'. $extn;
        Image::make($make)->resize(500,500)->save(public_path('uploads/doctor/'.$profileName));
        DoctorModel::insert([
            'country_id'    => $request->country_id,
            'state_id'      => $request->state_id,
            'hospital_id'   => $request->hospital_id,
            'department_id' => $request->department_id,
            'name'          => $request->name,
            'profile'       => $profileName,
            'career_title'  => $request->career_title,
            'speciality'    => $request->speciality,
            'fee'           => $request->fee,
            'vat'           => $request->vat,
            'created_by'    => Auth::guard('admin_model')->user()->id,
            'created_at'    => Carbon::now(),
        ]);
        return back()->with('succ','Successfully Done');
    }
    function doctorEdit($id){
        $data = DoctorModel::where('id',$id)->first();
        if (Auth::guard('admin_model')->user()->can('doctors')) {
            // Show the view page
            return view('backend.doctor.edit',['datas'=>$data]);
        } else {
            return abort(404);
        }
    }
    function doctorUpdate(Request $request){
        $request->validate([
            'name'          => 'required',
            'career_title'  => 'required',
            'speciality'    => 'required',
            'fee'           => 'required',
            'vat'           => 'required',
        ]);
        if ($request->profile != '') {
            $fileName = DoctorModel::where('id',$request->id)->first();
            $path = public_path('uploads/doctor/'.$fileName->profile);
            unlink($path);

            $make = $request->profile;
            $extn = $make->getClientOriginalExtension();
            $profileName = 'PRO'.rand(1,2000).'FILE'.rand(1,500).'.'. $extn;
            Image::make($make)->resize(500,500)->save(public_path('uploads/doctor/'.$profileName));
            DoctorModel::where('id',$request->id)->update([
                'profile' => $profileName,
            ]);
        }
        DoctorModel::where('id',$request->id)->update([
            'name'          => $request->name,
            'career_title'  => $request->career_title,
            'speciality'    => $request->speciality,
            'fee'           => $request->fee,
            'vat'           => $request->vat,
        ]);
        return back()->with('succ','Update Successfully');
    }
    function delete($id){
        $data = DoctorModel::where('id',$id)->first();
        $path = public_path('uploads/doctor/'.$data->profile);
        unlink($path);
        $data->delete();
        return back()->with('delete', 'Data Deleted Successfully');
    }
    function doctorAjax(Request $request){
        $department = '<option value="">-- Select Department --</option>';
        foreach (DepartmentModel::where('hospital_id',$request->hospital_id)->get() as  $value) {
            $department .= '<option value="'.$value->id.'">'.$value->department.'</option>';
        }
        return $department;
    }
    // manage link
    function doctorManage(){
        $data = DoctorModel::where('status',1)->paginate(10);
        if (Auth::guard('admin_model')->user()->can('doctors')) {
            // Show the view page
            return view('backend.doctor.manage',['datas' => $data]);
        } else {
            return abort(404);
        }

    }
}
