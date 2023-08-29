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
        Route::get('get-user-Booths', 'getBooths');
        Route::post('party-dispatch', 'partyDispatch');
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



