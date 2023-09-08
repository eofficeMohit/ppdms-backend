<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\UserLogin;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('web_push');
    }

    /** 
     * Write code on Method
     *
     * @return response()
     */
    public function saveToken(Request $request)
    {        
        // dd($request);
        UserLogin::where('user_id',auth()->user()->id)->orderBy('id','desc')->first()->update(['device_token'=>$request->token]);
        return response()->json(['token saved successfully.']);
    }

     /**
     * Write code on Method
     *
     * @return response()
     */
    public function sendNotification(Request $request)
    {
        // dd(auth()->user()->id);
        // $firebaseToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        $firebaseToken = UserLogin::where('user_id',auth()->user()->id)->orderBy('id','desc')->pluck('device_token')->all();

        // $SERVER_API_KEY = 'AAAAVKk2JtE:APA91bHv1-uJcgncU7vNBE4VlvScUMnN6eQb29htAVRIOYUprLZBxu_879guuVrBOGfN07G7pf8HN2Wp0abYoXkrOC2jVHrhcQw2dFxP1Xviv06FT8nRqQioRPX5z7TKcKR02UE3ZXm-';
        $SERVER_API_KEY ='AAAACptJ01o:APA91bF-JYW1cRJXyjds2L7VE171VS9gMEGSFxF7Blgd6EAAcGjk2qa0SjNTiA4i_1uTDX4rsVUP87zi4g9P4WQgfD75tKC_VGZhj2_ANSO7McI9eNdKklC00F6TGuRQitYXahwfy6Lf';
        //   dd($firebaseToken);
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];

        // dd($data);
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
        // print_r($response);die;
        dd($response);
    }
}
