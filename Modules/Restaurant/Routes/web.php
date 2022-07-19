<?php
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
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

Route::middleware([
    'auth:sanctum',
    'verified',
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
    ])->prefix('restaurant')->group(function () {

    Route::get('dashboard', 'RestaurantController@index')->name('restaurant_dashboard');
    Route::get('notes/print/{external_id}/{format?}', 'ChargeController@printSaleNote');

    Route::group(['prefix' => 'administration'], function () {
        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_categorias'])->get('categories/list', 'CategoriesController@index')->name('restaurant_categories_list');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_categorias_nuevo'])->get('categories/create', 'CategoriesController@create')->name('restaurant_categories_create');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_categorias_editar'])->get('categories/edit/{id}', 'CategoriesController@edit')->name('restaurant_categories_edit');

        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_marcas'])->get('brands/list', 'BrandsController@index')->name('restaurant_brands_list');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_marcas_nuevo'])->get('brands/create', 'BrandsController@create')->name('restaurant_brands_create');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_marcas_editar'])->get('brands/edit/{id}', 'BrandsController@edit')->name('restaurant_brands_edit');

        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_mesas'])->get('tables/list', 'TablesController@index')->name('restaurant_tables_list');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_mesas_nuevo'])->get('tables/create', 'TablesController@create')->name('restaurant_tables_create');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_mesas_editar'])->get('tables/edit/{id}', 'TablesController@edit')->name('restaurant_tables_edit');

        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_comandas'])->get('commands/list', 'CommandsController@index')->name('restaurant_commands_list');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_comandas_nuevo'])->get('commands/create', 'CommandsController@create')->name('restaurant_commands_create');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_comandas_editar'])->get('commands/edit/{id}', 'CommandsController@edit')->name('restaurant_commands_edit');

        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_pisos'])->get('floors/list', 'FloorsController@index')->name('restaurant_floors_list');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_pisos_nuevo'])->get('floors/create', 'FloorsController@create')->name('restaurant_floors_create');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_administracion_pisos_editar'])->get('floors/edit/{id}', 'FloorsController@edit')->name('restaurant_floors_edit');
    });

    Route::group(['prefix' => 'panels'], function () {
        Route::middleware(['middleware' => 'role_or_permission:restaurante_panel_atender'])->get('tables', 'AttendController@index')->name('restaurant_panels_tables');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_panel_delivery'])->get('deliveries', 'DeliveriesController@index')->name('restaurant_panels_deliveries');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_panel_atender'])->get('tables/attend', 'AttendController@attend')->name('restaurant_panels_attend');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_panel_pedidos'])->get('orders/list', 'OrdersController@index')->name('restaurant_panels_orders');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_panel_cobrar'])->get('charge/list', 'ChargeController@index')->name('restaurant_panels_charge');
        Route::middleware(['middleware' => 'role_or_permission:restaurante_panel_cobrar'])->get('charge/sale_note/{id}', 'ChargeController@sale_note')->name('restaurant_panels_charge_sale_note');
    });
});
