<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Modules\Sales\Http\Controllers\DocumentsController;
/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/

Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::get('/tenant', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('login', function () {
        return view('page_login');
    })->name('login');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');

    Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('micomprobante', [DocumentsController::class, 'documentSearch'])->name('micomprobante');
    Route::get('download/{domain}/{type}/{filename}', [DocumentsController::class, 'downloadExternal'])->name('download_sale_document_public');
});
