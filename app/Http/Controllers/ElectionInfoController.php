<?php

namespace App\Http\Controllers;

use App\Models\ElectionInfo;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class ElectionInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        $data = ElectionInfo::with('state','district','booth')->latest()->paginate(20);
        return view('election_info.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 20);
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
    public function show(ElectionInfo $electionInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ElectionInfo $electionInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ElectionInfo $electionInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ElectionInfo $electionInfo)
    {
        //
    }
}
