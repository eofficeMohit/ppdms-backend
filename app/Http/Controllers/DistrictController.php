<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class DistrictController extends Controller
{
    public function index(Request $request) :View
    {
        $data = District::with('state')->latest()->paginate(20);
        return view('district.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 20);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(District $district)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(District $district)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, District $district)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(District $district)
    {
        //
    }
    public function updateStatus(Request $request)
    {

        $district = District::find($request->id);

        $district->status = $request->status;

        $district->save();

        return response()->json(['success'=>'Status change successfully.']);

    }
}
