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

Route::group(['prefix' => 'system'], function () {
    Route::get('login', [LoginController::class, 'index'])->name('login');
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth:admins')->name('landlord_dashboard');
    Route::get('customers', [CustomerController::class, 'index'])->middleware('auth:admins')->name('landlord_customer');
    Route::get('customers/create', [CustomerController::class, 'create'])->middleware('auth:admins')->name('landlord_customer_create');
    Route::get('customers/edit', [CustomerController::class, 'edit'])->middleware('auth:admins')->name('landlord_customer_edit');
});

Route::post('system/logout', function () {
    return redirect('system/login')->with(Auth::logout());
})->name('landlord_logout');
