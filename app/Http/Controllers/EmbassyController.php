<?php

namespace App\Http\Controllers;

use App\Models\Embassy;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class EmbassyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Embassy::orderBy('id', 'DESC')->paginate(10);
        return view('backend.database.embassy',['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        print_r($request->all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'embassy' => 'required',
        ]);
        Embassy::insert([
            'name'          => $request->embassy,
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
        Embassy::where('id',$id)->delete();
        return back()->with('succ','Item Deleted');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if ($id != '') {
            Embassy::where('id',$id)->update([
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
