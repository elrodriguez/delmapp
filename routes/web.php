<?php

use App\Http\Controllers\Landlord\DashboardController;
use App\Http\Controllers\Landlord\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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


Route::get('/', [LoginController::class, 'index'])->name('home');

Route::group(['prefix' => 'administrator'], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth:admins')->name('landlord_dashboard');
});

Route::post('administrator/logout', function () {
    return redirect('administrator/login')->with(Auth::logout());
})->name('administrator_logout');
