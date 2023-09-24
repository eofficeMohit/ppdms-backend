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
