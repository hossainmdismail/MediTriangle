<?php

namespace App\Http\Controllers;

use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use Illuminate\Http\Request;

class FindDoctorController extends Controller
{
    function link(Request $request){
        $doctor = DoctorModel ::where('status',1)->paginate(10);;
        $department = DepartmentModel::where('status',1)->get();
        if ($request->department != null) {
            $doctor = DoctorModel ::where('department_id',$request->department)->paginate(10);
        }
        return view('frontend.doctor.index',[
            'doctors'       =>  $doctor,
            'department'    =>  $department,
        ]);
    }
}
