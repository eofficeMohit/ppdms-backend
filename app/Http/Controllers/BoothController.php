<?php

namespace App\Http\Controllers;

use App\Models\Booth;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class BoothController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        $data = Booth::latest()->paginate(20);
        return view('booth.index',compact('data'))->with('i', ($request->input('page', 1) - 1) * 20);
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
    public function show(Booth $booth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booth $booth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booth $booth)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booth $booth)
    {
        //
    }
}
