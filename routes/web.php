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
use App\Http\Controllers\IssueManagementController;
use App\Http\Controllers\DashboardSettingsController;
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
	Route::get('/role/delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');
	Route::get('/role/getdatatabledata', [RoleController::class, 'getUserRoleData'])->name('role.getdatatabledata');
    Route::resource('roles', RoleController::class);
	Route::get('/permission/delete/{id}', [PermissionController::class, 'destroy'])->name('permission.destroy');
	Route::get('/permission/getdatatabledata', [PermissionController::class, 'getPermissionsData'])->name('permission.getdatatabledata');
    Route::resource('permissions', PermissionController::class);
	Route::get('/user/updateStatus', [UserController::class, 'updateStatus'])->name('user.updateStatus');
    Route::resource('users', UserController::class);

	Route::get('/so-index', [UserController::class, 'soIndex'])->name('so.index');
	Route::get('/user/delete/{id}', [UserController::class, 'destroy'])->name('user.destroy');
	Route::get('/user/getdatatabledata', [UserController::class, 'getSoUserTableData'])->name('user.getdatatabledata');
	Route::get('/user/getusertabledata', [UserController::class, 'getUserTableData'])->name('user.getusertabledata');
	Route::get('/user/getuserlogindata', [UserController::class, 'getUserLoginData'])->name('user.getuserlogindata');
	Route::get('/user/permission/{permission}', [UserController::class, 'checkPermission'])->name('user.permission');

	Route::resource('parliaments', ParliamentController::class);
	Route::get('/parliament/delete/{id}', [ParliamentController::class, 'destroy'])->name('parliament.destroy');
	Route::get('/parliament/getdatatabledata', [ParliamentController::class, 'getParliamentData'])->name('parliament.getdatatabledata');
	Route::get('/parliament/updateStatus', [ParliamentController::class, 'updateStatus'])->name('parliament.updateStatus');


	Route::get('/state/delete/{id}', [StateController::class, 'destroy'])->name('state.destroy');
	Route::get('/state/getdatatabledata', [StateController::class, 'getStateData'])->name('state.getdatatabledata');
	Route::get('/states/updateStatus', [StateController::class, 'updateStatus'])->name('states.updateStatus');
	Route::resource('states', StateController::class);
	Route::get('/districts/getdatatabledata', [DistrictController::class, 'getDistrictTableData'])->name('districts.getdatatabledata');
	Route::get('/districts/updateStatus', [DistrictController::class, 'updateStatus'])->name('districts.updateStatus');
	Route::get('/districts/delete/{id}', [DistrictController::class, 'destroy'])->name('districts.destroy');
	Route::resource('districts', DistrictController::class);

	Route::get('/dashboard-settings', [DashboardSettingsController::class, 'index'])->name('dashboard-settings');
	Route::get('/dashboard-settings/create', [DashboardSettingsController::class, 'create'])->name('dashboard-settings.create');
	Route::get('/dashboard-settings/show/{id}', [DashboardSettingsController::class, 'show'])->name('dashboard-settings.show');
	Route::get('/dashboard-settings/edit/{id}', [DashboardSettingsController::class, 'edit'])->name('dashboard-settings.edit');
	Route::post('/dashboard-settings/store', [DashboardSettingsController::class, 'store'])->name('dashboard-settings.store');
	Route::patch('/dashboard-settings/update/{id}', [DashboardSettingsController::class, 'update'])->name('dashboard-settings.update');
	Route::get('/dashboard-settings/destroy/{id}', [DashboardSettingsController::class, 'destroy'])->name('dashboard-settings.destroy');
	Route::get('/dashboard-settings/updateStatus', [DashboardSettingsController::class, 'updateStatus'])->name('dashboard-settings.updateStatus');
	Route::get('/dashboard-settings/getdatatabledata', [DashboardSettingsController::class, 'getDBSettingsData'])->name('dashboard-settings.getdatatabledata');


	Route::get('/assemblies', [AssemblyController::class, 'index'])->name('assemblies');      // List all tasks
	Route::get('/assemblies/create', [AssemblyController::class, 'create'])->name('assemblies.create');
	Route::get('/assemblies/show/{id}', [AssemblyController::class, 'show'])->name('assemblies.show');
	Route::get('/assemblies/edit/{id}', [AssemblyController::class, 'edit'])->name('assemblies.edit');
	Route::post('/assemblies/store', [AssemblyController::class, 'store'])->name('assemblies.store');
	Route::patch('/assemblies/update/{id}', [AssemblyController::class, 'update'])->name('assemblies.update');
	Route::get('/assemblies/destroy/{id}', [AssemblyController::class, 'destroy'])->name('assemblies.destroy'); // Delete a task
	Route::get('/assemblies/getStates', [AssemblyController::class, 'getStates'])->name('assemblies.getStates');
	Route::get('/assemblies/getAssemblies', [AssemblyController::class, 'getAssemblies'])->name('assemblies.getAssemblies');
	Route::get('/assemblies/getBooths', [AssemblyController::class, 'getBooths'])->name('assemblies.getBooths');
	Route::get('/assemblies/updateStatus', [AssemblyController::class, 'updateStatus'])->name('assemblies.updateStatus');
	Route::get('/assemblies/getdatatabledata', [AssemblyController::class, 'getAssemblyTableData'])->name('assemblies.getdatatabledata');


	Route::get('/booth', [BoothController::class, 'index'])->name('booth');
	Route::get('/booth/create', [BoothController::class, 'create'])->name('booth.create');
	Route::get('/booth/show/{id}', [BoothController::class, 'show'])->name('booth.show');
	Route::get('/booth/edit/{id}', [BoothController::class, 'edit'])->name('booth.edit');
	Route::post('/booth/store', [BoothController::class, 'store'])->name('booth.store');
	Route::patch('/booth/update/{id}', [BoothController::class, 'update'])->name('booth.update');
	Route::get('/booth/destroy/{id}', [BoothController::class, 'destroy'])->name('booth.destroy'); // Delete a task
	Route::get('/booth/updateStatus', [BoothController::class, 'updateStatus'])->name('booth.updateStatus');
	Route::get('/booth/getdatatabledata', [BoothController::class, 'getBoothTableData'])->name('booth.getdatatabledata');

	//Route::get('/states', [StateController::class, 'index'])->name('states');
	//Route::get('/state/updateStatus', [StateController::class, 'updateStatus'])->name('state.updateStatus');
	//Route::get('/districts', [DistrictController::class, 'index'])->name('districts');
	//Route::get('/districts/updateStatus', [DistrictController::class, 'updateStatus'])->name('districts.updateStatus');

	Route::get('/election-info', [ElectionInfoController::class, 'index'])->name('election-info');
	Route::get('/election-info/edit/{id}', [ElectionInfoController::class, 'edit'])->name('election-info.edit');
	Route::patch('/election-info/update/{id}', [ElectionInfoController::class, 'update'])->name('election-info.update');
	Route::get('/election-info/create', [ElectionInfoController::class, 'create'])->name('election-info.create');
	Route::post('/election-info/store', [ElectionInfoController::class, 'store'])->name('election-info.store');
	Route::get('/election-info/show/{id}', [ElectionInfoController::class, 'show'])->name('election-info.show');
	Route::post('/election-info/updateEventToggle', [ElectionInfoController::class, 'updateEventToggle'])->name('election-info.updateEventToggle');

	Route::get('/election-info/destroy/{id}', [ElectionInfoController::class, 'destroy'])->name('election-info.destroy'); // Delete a task
	Route::get('/election/updateStatus', [ElectionInfoController::class, 'updateStatus'])->name('election.updateStatus');
	Route::get('/election/getdatatabledata', [ElectionInfoController::class, 'getElectionInfoData'])->name('election.getdatatabledata');
	Route::get('/election/getPollInterruptedDetails', [ElectionInfoController::class, 'getPollInterruptedDetails'])->name('election.getPollInterruptedDetails');


	Route::get('/events', [EventController::class, 'index'])->name('events');
	Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
	Route::get('/event/show/{id}', [EventController::class, 'show'])->name('event.show');
	Route::get('/event/edit/{id}', [EventController::class, 'edit'])->name('event.edit');
	Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
	Route::patch('/event/update/{id}', [EventController::class, 'update'])->name('event.update');
	Route::get('/event/getEventsForEInfo', [EventController::class, 'getEventsForEInfo'])->name('event.getEventsForEInfo');
	Route::get('/event/destroy/{id}', [EventController::class, 'destroy'])->name('event.destroy'); // Delete a task
	Route::get('/event/updateStatus', [EventController::class, 'updateStatus'])->name('event.updateStatus');
	Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
	Route::get('/notifications/getdatatabledata/{id}', [NotificationController::class, 'getNotificationData'])->name('notifications.getdatatabledata');
	Route::post('/notifications/updateStatus', [NotificationController::class, 'updateStatus'])->name('notifications.updateStatus');
	Route::get('/notifications/updateNotiStatus', [NotificationController::class, 'updateNotiStatus'])->name('notifications.updateNotiStatus');

	Route::get('/event/getdatatabledata', [EventController::class, 'getEventData'])->name('event.getdatatabledata');

//Route::get('/states', [StateController::class, 'index'])->name('states');
//Route::get('/state/updateStatus', [StateController::class, 'updateStatus'])->name('state.updateStatus');
//Route::get('/districts', [DistrictController::class, 'index'])->name('districts');
//Route::get('/districts/updateStatus', [DistrictController::class, 'updateStatus'])->name('districts.updateStatus');

Route::get('/election-info', [ElectionInfoController::class, 'index'])->name('election-info');
Route::get('/election-info/edit/{id}', [ElectionInfoController::class, 'edit'])->name('election-info.edit');
Route::patch('/election-info/update/{id}', [ElectionInfoController::class, 'update'])->name('election-info.update');
Route::get('/election-info/create', [ElectionInfoController::class, 'create'])->name('election-info.create');
Route::post('/election-info/store', [ElectionInfoController::class, 'store'])->name('election-info.store');
Route::get('/election-info/show/{id}', [ElectionInfoController::class, 'show'])->name('election-info.show');
Route::delete('/election-info/destroy/{id}', [ElectionInfoController::class, 'destroy'])->name('election-info.destroy'); // Delete a task
Route::get('/election-info-new/create', [ElectionInfoController::class, 'create_new'])->name('election-info-new.create');


    Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
    Route::get('/login-reports', [UserController::class, 'loginReport'])->name('login.report');
    Route::get('/issue-management', [IssueManagementController::class, 'index'])->name('issue.index');

    Route::get('/map_booth', [BoothController::class, 'map_booth'])->name('map_booth');
    Route::get('/booths/getSoUsers', [BoothController::class, 'getSoUsers'])->name('booths.getSoUsers');
    Route::get('/booths/getMapBooths', [BoothController::class, 'getMapBooths'])->name('booths.getMapBooths');
    Route::post('/booths/mapOffBooths', [BoothController::class, 'mapOffBooths'])->name('booths.mapOffBooths');


Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications');
Route::get('/login-reports', [UserController::class, 'loginReport'])->name('login.report');
Route::get('/issue-management/getdatatabledata', [IssueManagementController::class, 'getIssueManagementData'])->name('issue-management.getdatatabledata');
Route::get('/issue-management', [IssueManagementController::class, 'index'])->name('issue.index');

});

Auth::routes(['login' => false]);

Route::get('/', function () {return redirect('sign-in');})->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
Route::get('/dashboard-stat', [DashboardController::class, 'indexStat'])->middleware('auth')->name('dashboard.stat');
Route::get('sign-up', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('sign-up', [RegisterController::class, 'store'])->middleware('guest');
Route::get('sign-in', [SessionsController::class, 'create'])->middleware('guest')->name('login');
Route::post('sign-in', [SessionsController::class, 'store'])->middleware('guest')->name('login.store');
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
	// Route::get('demo_notifications', function () {
	// 	return view('pages.notifications');
	// })->name('notifications');
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
	Route::get('user-toast', function () {
		return view('pages.notifications');
	})->name('user-toast');

});

Route::get('/web-push', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/save-token', [App\Http\Controllers\HomeController::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('send.notification');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
