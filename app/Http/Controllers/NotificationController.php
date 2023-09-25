<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\View\View;
use DataTables;


class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) :View
    {
        return view('notifications.index');
    }

    public function getNotificationData(){
        $data = Notification::with(['user'])->get();
        return Datatables::of($data)
             ->addIndexColumn()
             ->addColumn('user_name', function($row){
                return $row->user->name;
                })
             ->make();
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
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
