<?php

namespace App\Http\Controllers;

use ArrayIterator;
use MultipleIterator;
use App\Models\HealthCard;
use Illuminate\Http\Request;
use App\Models\HealthCardApplicaton;
use Illuminate\Support\Facades\Auth;

class HealthCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $healths = HealthCard::all();

        if (Auth::guard('admin_model')->user()->can('database')) {
            return view('backend.health-card.index',compact('healths'));
            // Show the view page
        } else {
            return abort(404);
        }

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
            'name' => 'required',
            'price' => 'required',
            'benifits.*'  => 'required',
        ]);

        $health = new HealthCard();
        $health->name = $request->name;
        $health->price = $request->price;
        $health->benifits = json_encode($request->benifits);
        $health->status = 1;
        $health->save();



        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $healths= HealthCard::find($id);

        if (Auth::guard('admin_model')->user()->can('database')) {
            if (Auth::guard('admin_model')->user()->can('edit')){

                return view('backend.health-card.edit', compact('healths',));
            }else {
                return abort(404);
            }
            // Show the view page
        } else {
            return abort(404);
        }

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'price' => 'required',

        ]);
        $health = HealthCard::find($id);
        $health->name = $request->name;
        $health->price = $request->price;
        $health->benifits = json_encode($request->benifits);
        $health->status = $request->status;
        $health->save();
        return redirect(route('health-card.index'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        HealthCard::find($id)->delete();
        return back();
    }

    public function healthCardData(){
        $applicatios = HealthCardApplicaton::all();
        if (Auth::guard('admin_model')->user()->can('health_card_application')){
            return view('backend.health-card.healthCardApplication', compact('applicatios'));
        }else{
            return abort(404);
        }

    }
    public function healthCardDataEdit($id){
        $applications = HealthCardApplicaton::find($id);
        if (Auth::guard('admin_model')->user()->can('health_card_application')){
            return view('backend.health-card.editHealthCardApplication',compact('applications'));
        }else{
            return abort(404);
        }

    }
    public function healthCardDataUpdate(Request $request ){
        if (Auth::guard('admin_model')->user()->can('health_card_application')){
            $applications = HealthCardApplicaton::find($request->id);
            $applications->status = $request->status;
            $applications->note = $request->note;
            $applications->save();
            return redirect(route('health.card.data'));
        }else{
            return abort(404);
        }

    }
}
