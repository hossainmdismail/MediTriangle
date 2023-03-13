<?php

namespace App\Http\Controllers;

use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use App\Models\HospitalModel;
use App\Models\StateModel;
use Illuminate\Http\Request;

class FrontAjaxController extends Controller
{
    function state(Request $request){
        $country = '<option value="">-- Select State --</option>';
        foreach (StateModel::where('country_id',$request->country_id)->get() as  $value) {
            $country .= '<option value="'.$value->id.'">'.$value->state.'</option>';
        }
        return $country;
    }
    function department(Request $request){
        $state = '<option value="">-- Select Hospital --</option>';
        foreach (HospitalModel::where('state_id',$request->state_id)->get() as  $value) {
            $state .= '<option value="'.$value->id.'">'.$value->hospital.'</option>';
        }
        return $state;
    }
    function hospital(Request $request){
        $department = '<option value="">-- Select Department --</option>';
        foreach (DepartmentModel::where('hospital_id',$request->hospital_id)->get() as  $value) {
            $department .= '<option value="'.$value->id.'">'.$value->department.'</option>';
        }
        return $department;
    }
    function doctor(Request $request){
        $department = '<option value="">-- Select Doctor --</option>';
        foreach (DoctorModel::where('department_id',$request->department_id)->get() as  $value) {
            $department .= '<option value="'.$value->id.'">'.$value->name.'</option>';
        }
        return $department;
    }
    function doctorInfo(Request $request){
        $doctor = DoctorModel::where('id',$request->doctor_id)->first();
        $data = '<tr class="text-start"><th><img src="'.asset('uploads/doctor/'.$doctor->profile).'") }}" alt="'.$doctor->name.'" width="100px"></th><td>Fee : <span>'.$doctor->fee.' ৳</span> <br>Vat : <span>'.$doctor->vat.'%</span> <br>Total : <span>'.$doctor->fee+(($doctor->vat/100)*$doctor->fee).' ৳</span></td></tr> <input type="hidden" name="fee" value="'.$doctor->fee+(($doctor->vat/100)*$doctor->fee).'">';
        return $data;
    }
}
