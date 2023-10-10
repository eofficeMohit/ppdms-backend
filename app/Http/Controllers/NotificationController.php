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
        $data = Notification::with(['user'])->orderBy('created_at', 'desc');
        return Datatables::eloquent($data)
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

    public function updateStatus(Request $request)
    {
        $id = $request['params']['id'];
        $notification = Notification::find($id);
        $notification->seen = "1";
        $notification->save();
        $getUnSeenNotifications = Notification::all()->where('user_id','1')->where('seen','0');
        $count = count($getUnSeenNotifications);
        $img =  asset('assets/img/team-2.jpg'); 
        $data = "";
        if($count > 0){
            foreach($getUnSeenNotifications as $key => $notification){
                $data .='<li class="mb-2"><a class="dropdown-item border-radius-md" href="javascript:;">';
                $data .='<div class="d-flex py-1">';
                $data .='<div class="my-auto"><img src="'.$img.'" class="avatar avatar-sm bg-gradient-dark  me-3 "></div>';
                $data .='<div class="d-flex flex-column justify-content-center">';
                $data .='<h6 class="text-sm font-weight-normal mb-1"><span class="font-weight-bold">'.$notification->title.'</span> by '.$notification->message.'</h6>';
                $data .='<p class="text-xs text-secondary mb-0"><i class="fa fa-clock me-1"></i>'.$notification->created_at.'</p>';
                $data .='<p class="text-xs text-secondary mb-0"><a class="mark_as_read" data-id="'.$notification->id.'"><i class="fa fa-check me-1">Mark As Read</i></a></p></div></div></a></li>';
            }
        } else {
            $data = '<li class="mb-2"><p class="text-xs text-secondary mb-0">No Notifications Found.</p></li>';
        }
        return response()->json(['success'=>'Status changed successfully.','data'=>$data, 'count'=>$count]);

    }
           
    public function sendPushNotification(Notification $notification)
    {
        $SERVER_API_KEY ='AAAACptJ01o:APA91bF-JYW1cRJXyjds2L7VE171VS9gMEGSFxF7Blgd6EAAcGjk2qa0SjNTiA4i_1uTDX4rsVUP87zi4g9P4WQgfD75tKC_VGZhj2_ANSO7McI9eNdKklC00F6TGuRQitYXahwfy6Lf';
        $url = 'https://fcm.googleapis.com/fcm/send';
        $dataArr = array('click_action' => 'FLUTTER_NOTIFICATION_CLICK', 'id' => "123erssrd",'status'=>"done");
        $notification = array('title' =>"Test", 'text' => "This is test message", 'sound' => 'default', 'badge' => '1',);
        $arrayToSend = array('to' => "a3437be0-5c82-11ee-bac4-2d984cd7fea3", 'notification' => $notification, 'data' => $dataArr, 'priority'=>'high');
        $fields = json_encode ($arrayToSend);
        $headers = array (
            'Authorization: key=' .$SERVER_API_KEY,
            'Content-Type: application/json'
        );
   
        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );
        $result = curl_exec ( $ch );
        echo $result;
        curl_close ( $ch );
        return $result;
    }
}
