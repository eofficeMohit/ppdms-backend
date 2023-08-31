<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CommonApiController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Clear application cache:
Route::get('/clear-cache', function() {
    Artisan::call('cache:clear');
    return 'Application cache has been cleared';
});

//Clear route cache:
Route::get('/route-cache', function() {
	Artisan::call('route:cache');
    return 'Routes cache has been cleared';
});

//Clear config cache:
Route::get('/config-cache', function() {
 	Artisan::call('config:cache');
 	return 'Config cache has been cleared';
}); 

// Clear view cache:
Route::get('/view-clear', function() {
    Artisan::call('view:clear');
    return 'View cache has been cleared';
});

Route::controller(RegisterController::class)->group(function(){
    Route::post('register', 'register');
    Route::post('Validate-mobile', 'ValidateMobile');
    Route::post('Validate-mobile-otp', 'ValidateMobileOtp');
});


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->group( function () {
    // Route::resource('users', UsersController::class);
    Route::controller(CommonApiController::class)->group(function(){
        Route::post('user-profile-details', 'userProfile');
        Route::post('user-booths', 'getBooths');
        Route::get('get-events', 'getEvents');
        Route::post('event-update', 'eventUpdate');
    });
});



Route::get('unauthorized', function () {

    return  abort(response()->json(
                [
                    'status' => 'Error',
                    'message' => 'Unauthenticated',
                    'data' => []
                ], 401));
})->name('unauthorized');



