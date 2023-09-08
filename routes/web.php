<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\AssemblyController;
use App\Http\Controllers\BoothController;
use App\Http\Controllers\ElectionInfoController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ParliamentController;
use App\Http\Controllers\NotificationController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);

	
	Route::get('/so-index', [UserController::class, 'soIndex'])->name('so.index');   
	Route::resource('parliaments', ParliamentController::class);

Route::get('/assemblies', [AssemblyController::class, 'index'])->name('assemblies');      // List all tasks
Route::get('/assemblies/create', [AssemblyController::class, 'create'])->name('assemblies.create');
Route::get('/assemblies/show/{id}', [AssemblyController::class, 'show'])->name('assemblies.show');
Route::get('/assemblies/edit/{id}', [AssemblyController::class, 'edit'])->name('assemblies.edit');
Route::post('/assemblies/store', [AssemblyController::class, 'store'])->name('assemblies.store');
Route::patch('/assemblies/update/{id}', [AssemblyController::class, 'update'])->name('assemblies.update');
Route::delete('/assemblies/destroy/{id}', [AssemblyController::class, 'destroy'])->name('assemblies.destroy'); // Delete a task
Route::get('/assemblies/getStates', [AssemblyController::class, 'getStates'])->name('assemblies.getStates');
Route::get('/assemblies/getAssemblies', [AssemblyController::class, 'getAssemblies'])->name('assemblies.getAssemblies');
Route::get('/assemblies/getBooths', [AssemblyController::class, 'getBooths'])->name('assemblies.getBooths');


Route::get('/booth', [BoothController::class, 'index'])->name('booth');
Route::get('/booth/create', [BoothController::class, 'create'])->name('booth.create');
Route::get('/booth/show/{id}', [BoothController::class, 'show'])->name('booth.show');
Route::get('/booth/edit/{id}', [BoothController::class, 'edit'])->name('booth.edit');
Route::post('/booth/store', [BoothController::class, 'store'])->name('booth.store');
Route::patch('/booth/update/{id}', [BoothController::class, 'update'])->name('booth.update');
Route::delete('/booth/destroy/{id}', [BoothController::class, 'destroy'])->name('booth.destroy'); // Delete a task

Route::get('/states', [StateController::class, 'index'])->name('states');
Route::get('/states/updateStatus', [StateController::class, 'updateStatus'])->name('states.updateStatus');
Route::get('/districts', [DistrictController::class, 'index'])->name('districts');
Route::get('/districts/updateStatus', [DistrictController::class, 'updateStatus'])->name('districts.updateStatus');

Route::get('/election-info', [ElectionInfoController::class, 'index'])->name('election-info');
Route::get('/election-info/edit/{id}', [ElectionInfoController::class, 'edit'])->name('election-info.edit');
Route::patch('/election-info/update/{id}', [ElectionInfoController::class, 'update'])->name('election-info.update');
Route::get('/election-info/create', [ElectionInfoController::class, 'create'])->name('election-info.create');
Route::post('/election-info/store', [ElectionInfoController::class, 'store'])->name('election-info.store');
Route::get('/election-info/show/{id}', [ElectionInfoController::class, 'show'])->name('election-info.show');
Route::delete('/election-info/destroy/{id}', [ElectionInfoController::class, 'destroy'])->name('election-info.destroy'); // Delete a task



Route::get('/events', [EventController::class, 'index'])->name('events');
Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
Route::get('/event/show/{id}', [EventController::class, 'show'])->name('event.show');
Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
Route::patch('/event/update/{id}', [EventController::class, 'update'])->name('event.update');
Route::delete('/event/destroy/{id}', [EventController::class, 'destroy'])->name('event.destroy'); // Delete a task

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');

Route::get('/login-reports', [UserController::class, 'loginReport'])->name('login.report');
});


Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/dashboard-stat', [DashboardController::class, 'indexStat'])->middleware('auth')->name('dashboard.stat');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest');
Route::post('verify', [SessionsController::class, 'show'])->middleware('guest');
Route::post('reset-password', [SessionsController::class, 'update'])->middleware('guest')->name('password.update');
Route::get('verify', function () {
	return view('sessions.password.verify');
})->middleware('guest')->name('verify');
Route::get('/reset-password/{token}', function ($token) {
	return view('sessions.password.reset', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('sign-out', [SessionsController::class, 'destroy'])->middleware('auth')->name('logout');
Route::get('profile', [ProfileController::class, 'create'])->middleware('auth')->name('profile');
Route::post('user-profile', [ProfileController::class, 'update'])->middleware('auth');
Route::group(['middleware' => 'auth'], function () {
	Route::get('billing', function () {
		return view('pages.billing');
	})->name('billing');
	Route::get('tables', function () {
		return view('pages.tables');
	})->name('tables');
	Route::get('rtl', function () {
		return view('pages.rtl');
	})->name('rtl');
	Route::get('virtual-reality', function () {
		return view('pages.virtual-reality');
	})->name('virtual-reality');
	/*Route::get('notifications', function () {
		return view('pages.notifications');
	})->name('notifications');*/
	Route::get('static-sign-in', function () {
		return view('pages.static-sign-in');
	})->name('static-sign-in');
	Route::get('static-sign-up', function () {
		return view('pages.static-sign-up');
	})->name('static-sign-up');
	Route::get('user-management', function () {
		return view('pages.laravel-examples.user-management');
	})->name('user-management');
	Route::get('user-profile', function () {
		return view('pages.laravel-examples.user-profile');
	})->name('user-profile');
	
});
