<?php

namespace App\Http\Controllers;

use App\Models\VisaType as ModelsVisaType;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class VisaType extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = ModelsVisaType::orderBy('id', 'DESC')->paginate(10);
        return view('backend.database.visatype',['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'visa' => 'required',
        ]);
        ModelsVisaType::insert([
            'name'          => $request->visa,
            'status'          => 1,
            'created_at'    => Carbon::now(),
        ]);
        return back()->with('succ','Embassy Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        ModelsVisaType::where('id',$id)->delete();
        return back()->with('succ','Item Deleted');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($id != '') {
            ModelsVisaType::where('id',$id)->update([
                'name' => $_GET['name'],
                'status' => $_GET['status'],
                'updated_at' => Carbon::now(),
            ]);
            return back()->with('succ','Updated');
        }else {
            return back()->with('succ','Something is wrong! Try again');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
