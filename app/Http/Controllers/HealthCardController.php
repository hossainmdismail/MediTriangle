<?php

namespace App\Http\Controllers;

use App\Models\HealthCard;
use Illuminate\Http\Request;

class HealthCardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $healths = HealthCard::all();

        return view('backend.health-card.index',compact('healths'));
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
            'benifits' => 'required',
        ]);
        $health = new HealthCard();

        $health->name = $request->name;
        $health->price = $request->price;
        $health->benifits = $request->benifits;
        $health->save();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
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
