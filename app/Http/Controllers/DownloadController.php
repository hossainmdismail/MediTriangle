<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
    //
    function imageDownload(Request $request){
        return json_encode($request->photo);
    }
}
