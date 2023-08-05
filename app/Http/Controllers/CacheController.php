<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Artisan;

class CacheController extends Controller
{
    function clearCache(){
        Artisan::call('cache:clear');
        Artisan::call('config:clear');
        Artisan::call('route:clear');
        Artisan::call('view:clear');

        return back()->with('succ' , 'Clear Memory Successfully');
    }
}
