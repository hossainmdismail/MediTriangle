<?php

namespace App\Http\Controllers;

use App\Models\AboutModel;
use App\Models\BannnerModel;
use App\Models\DepartmentModel;
use App\Models\DoctorModel;
use App\Models\ServiceModel;


use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\OpenGraph;
use Artesaos\SEOTools\Facades\TwitterCard;
use Artesaos\SEOTools\Facades\JsonLd;

class UserController extends Controller
{
    function home(){
        $about = AboutModel::where('status',1)->first();
        $banner = BannnerModel::where('status',1)->get();
        $doctor =DoctorModel::where('status',1)->get();
        $service =ServiceModel::where('status',1)->get();
        $department = DepartmentModel::where('status',1)->get();

        SEOMeta::setTitle('Home');
        SEOMeta::setDescription('This is my page description');
        SEOMeta::setCanonical('https://meditriangle.com');

        OpenGraph::setDescription('This is my page description');
        OpenGraph::setTitle('Home');
        OpenGraph::setUrl('https://meditriangle.com');
        OpenGraph::addProperty('type', 'articles');

        TwitterCard::setTitle('Homepage');
        TwitterCard::setSite('https://meditriangle.com');

        JsonLd::setTitle('Homepage');
        JsonLd::setDescription('This is my page description');
        JsonLd::addImage('http://meditriangle.com/frontend/brand.png');

        return view('frontend.index',[
            'about' => $about,
            'banner' => $banner,
            'doctors' => $doctor,
            'services' => $service,
            'department' => $department,
        ]);
    }
}
