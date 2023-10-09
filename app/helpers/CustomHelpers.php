<?php
if (!function_exists('checkPermission')) {
    function checkPermission($permission) {
        $user = Auth::user();
		$response = "denied";
        if ($user->can($permission)) {
			$response = "granted";
			return $response;
        }

        return $response;
    }
}

if (!function_exists('getUserNotification')) {
    function getUserNotification() {
        $notifications = \App\Models\Notification::all()->where('user_id','1')->where('seen','0');
        return $notifications;
    }
}

if (!function_exists('getInterruptionTypes')) {
    function getInterruptionTypes() {
        $types = \App\Models\PollInterruptedTypes::all();
        return $types;
    }
}

if (!function_exists('checkPollInterrupt')) {
    function checkPollInterrupt($user_id,$booth_id) {
        $check_event_poll_ended =\App\Models\ElectionInfo::where('event_id',8)->where('user_id',$user_id)->where('booth_id',$booth_id)->where('status', 1)->exists();
        $response = "denied";
        if($check_event_poll_ended ===false){
            $response = "granted";
        }
        return $response;
    }
}