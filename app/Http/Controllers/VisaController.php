<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VisaController extends Controller
{
    function visaLink(){
        return view('frontend.visa.index');
    }
}
