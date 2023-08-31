<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parliament;
use Illuminate\View\View;

class ParliamentController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request): View
    {
        $parliaments = Parliament::with(['state'])->orderBy('id','DESC')->paginate(10);
        return view('parliament.index',compact('parliaments'))
            ->with('i', ($request->input('page', 1) - 1) * 10);
    }
}
