<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserClientController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LiveSearchController;
use App\Http\Controllers\HiringDriverController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';



Route::get('/DriverRegistration', function () {
    return view('userDriver');
});

Route::post('createDriverAccount', [DriverController::class, 'createDriverAccount']);

Route::get('/ClientRegistration', function () {
    return view('userClient');
});

Route::post('createClientAccount', [UserClientController::class, 'createClientAccount']);

Route::get('/Registration', function () {
    return view('registrationBridge');
});

Route::post('loginUser', [LoginController::class, 'loginUser']);

Route::get('/LoginDriver', [DriverController::class, 'index']);

Route::get('/DriverProfile', function () {
    return view('userDriverProfile');
});

Route::get('/LoginClient', function () {
    return view('userClientDashboard');
});

Route::get('/LoginClient', [LiveSearchController::class, 'index']);

Route::get('/getDrivers', [LiveSearchController::class,'getDrivers'])->name('getDrivers');

Route::get('/getHiredDrivers', [LiveSearchController::class,'getHiredDrivers'])->name('getHiredDrivers');

Route::get('/getPendingDrivers', [LiveSearchController::class,'getPendingDrivers'])->name('getPendingDrivers');

Route::get('/ClientProfile', function () {
    return view('userClientProfile');
});

Route::get('logout', [LoginController::class, 'logoutUser']);




Route::get('/startHireDriver/{driverId}', [HiringDriverController::class, 'startHireDriver']);

Route::get('/endHireDriver/{driverId}/{id}', [HiringDriverController::class, 'endHireDriver']);

Route::get('/acceptJobDriver/{id}', [HiringDriverController::class, 'acceptJobDriver']);

Route::get('/declineJobDriver/{id}', [HiringDriverController::class, 'declineJobDriver']);

Route::get('/endJobDriver/{id}', [HiringDriverController::class, 'endJobDriver']);

