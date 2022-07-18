<?php

use Illuminate\Http\Request;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/sales', function (Request $request) {
//     return $request->user();
// });
Route::middleware([
    'auth:api',
    'cors',
    'api',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::group(['prefix' => 'sales'], function () {
        Route::post('products_search', 'ItemsController@searchItems');
        Route::get('products_prices/{id}', 'ItemsController@itemPrices');
        Route::get('establishments', 'SalesController@establishments');
    });
});
