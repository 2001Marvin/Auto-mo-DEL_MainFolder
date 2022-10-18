<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserClientController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\LoginController;

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

Route::get('/LoginDriver', function () {
    return view('userDriverDashboard');
});

Route::get('/DriverProfile', function () {
    return view('userDriverProfile');
});

Route::get('/LoginClient', function () {
    return view('userClientDashboard');
});

Route::get('logout', [LoginController::class, 'logoutUser']);

