<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\BannnerModel;
use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use App\Models\OwnerModel;
use App\Models\ServiceModel;
use App\Models\SocialMediaModel;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function home(){
        $about = AboutModel::where('status',1)->first();
        $banner = BannnerModel::where('status',1)->get();
        $doctor =DoctorModel::where('status',1)->get();
        $service =ServiceModel::where('status',1)->get();
        $department = DepartmentModel::where('status',1)->get();
        return view('frontend.index',[
            'about' => $about,
            'banner' => $banner,
            'doctors' => $doctor,
            'services' => $service,
            'department' => $department,
        ]);
    }
}
