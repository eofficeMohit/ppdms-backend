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
