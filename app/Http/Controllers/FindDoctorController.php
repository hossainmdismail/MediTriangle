<?php

namespace App\Http\Controllers;

use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use Illuminate\Http\Request;

use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\JsonLd;

class FindDoctorController extends Controller
{
    function link(Request $request){
        $doctor = DoctorModel ::where('status',1)->paginate(10);;
        $department = DepartmentModel::where('status',1)->get();
        if ($request->department != null) {
            $doctor = DoctorModel ::where('department_id',$request->department)->paginate(10);
        }
        SEOMeta::setTitle('Find Doctor'); //web title
        SEOTools::setDescription('this is description');
        SEOMeta::addKeyword('this is tags');
        OpenGraph::setTitle('this is seo title');
        SEOMeta::setCanonical('https://meditriangle.com' . request()->getPathInfo());
        return view('frontend.doctor.index',[
            'doctors'       =>  $doctor,
            'department'    =>  $department,
        ]);
    }
}
