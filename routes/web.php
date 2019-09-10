<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('list-pallet-pdf', 'PalletController@exportPdf')->name('pallets.pdf');

// Routes
Route::middleware(['auth'])->group(function(){
    // Roles
    Route::post('roles/store', 'RoleController@store')->name('roles.store')
        ->middleware('permission:roles.create');

    Route::get('roles', 'RoleController@index')->name('roles.index')
        ->middleware('permission:roles.index');

    Route::get('roles/create', 'RoleController@create')->name('roles.create')
        ->middleware('permission:roles.create');

    Route::put('roles/{role}', 'RoleController@update')->name('roles.update')
        ->middleware('permission:roles.edit');

    Route::get('roles/{role}', 'RoleController@show')->name('roles.show')
        ->middleware('permission:roles.show');

    Route::delete('roles/{role}', 'RoleController@destroy')->name('roles.destroy')
        ->middleware('permission:roles.destroy');

    Route::get('roles/{role}/edit', 'RoleController@edit')->name('roles.edit')
        ->middleware('permission:roles.edit');


    // Clients
    Route::post('clients/store', 'ClientController@store')->name('clients.store')
        ->middleware('permission:clients.create');

    Route::get('clients', 'ClientController@index')->name('clients.index')
        ->middleware('permission:clients.index');

    Route::get('clients/create', 'ClientController@create')->name('clients.create')
        ->middleware('permission:clients.create');

    Route::put('clients/{client}', 'ClientController@update')->name('clients.update')
        ->middleware('permission:clients.edit');

    Route::get('clients/{client}', 'ClientController@show')->name('clients.show')
        ->middleware('permission:clients.show');

    Route::delete('clients/{client}', 'ClientController@destroy')->name('clients.destroy')
        ->middleware('permission:clients.destroy');

    Route::get('clients/{client}/edit', 'ClientController@edit')->name('clients.edit')
        ->middleware('permission:clients.edit');

    // Users
    Route::get('users', 'UserController@index')->name('users.index')
        ->middleware('permission:users.index');

    Route::put('users/{user}', 'UserController@update')->name('users.update')
        ->middleware('permission:users.edit');

    Route::get('users/{user}', 'UserController@show')->name('users.show')
        ->middleware('permission:users.show');

    Route::delete('users/{user}', 'UserController@destroy')->name('users.destroy')
        ->middleware('permission:users.destroy');

    Route::get('users/{user}/edit', 'UserController@edit')->name('users.edit')
        ->middleware('permission:users.edit');

    // Permissions
    Route::get('permissions', 'PermissionController@index')->name('permissions.index')
        ->middleware('permission:permissions.index');

    Route::get('permissions/create', 'PermissionController@create')->name('permissions.create')
        ->middleware('permission:permissions.create');
    
    Route::post('permissions/store', 'PermissionController@store')->name('permissions.store')
        ->middleware('permission:permissions.create');

    Route::put('permissions/{permission}', 'PermissionController@update')->name('permissions.update')
        ->middleware('permission:permissions.edit');

    Route::get('permissions/{permission}', 'PermissionController@show')->name('permissions.show')
        ->middleware('permission:permissions.show');

    Route::delete('permissions/{permission}', 'PermissionController@destroy')->name('permissions.destroy')
        ->middleware('permission:permissions.destroy');

    Route::get('permissions/{permission}/edit', 'PermissionController@edit')->name('permissions.edit')
        ->middleware('permission:permissions.edit');

    // Loads
    Route::post('loads/store', 'LoadController@store')->name('loads.store')
    ->middleware('permission:loads.create');

    Route::get('loads', 'LoadController@index')->name('loads.index')
        ->middleware('permission:loads.index');

    Route::get('loads/create', 'LoadController@create')->name('loads.create')
        ->middleware('permission:loads.create');

    Route::put('loads/{load}', 'LoadController@update')->name('loads.update')
        ->middleware('permission:loads.edit');

    Route::get('loads/{load}', 'LoadController@show')->name('loads.show')
        ->middleware('permission:loads.show');

    Route::delete('loads/{load}', 'LoadController@destroy')->name('loads.destroy')
        ->middleware('permission:loads.destroy');

    Route::get('loads/{load}/edit', 'LoadController@edit')->name('loads.edit')
        ->middleware('permission:loads.edit');

    // Farms
    Route::post('farms/store', 'FarmController@store')->name('farms.store')
    ->middleware('permission:farms.create');

    Route::get('farms', 'FarmController@index')->name('farms.index')
        ->middleware('permission:farms.index');

    Route::get('farms/create', 'FarmController@create')->name('farms.create')
        ->middleware('permission:farms.create');

    Route::put('farms/{farm}', 'FarmController@update')->name('farms.update')
        ->middleware('permission:farms.edit');

    Route::get('farms/{farm}', 'FarmController@show')->name('farms.show')
        ->middleware('permission:farms.show');

    Route::delete('farms/{farm}', 'FarmController@destroy')->name('farms.destroy')
        ->middleware('permission:farms.destroy');

    Route::get('farms/{farm}/edit', 'FarmController@edit')->name('farms.edit')
        ->middleware('permission:farms.edit');

    // Pallets
    Route::post('pallets/store', 'PalletController@store')->name('pallets.store')
    ->middleware('permission:pallets.create');

    Route::get('pallets', 'PalletController@index')->name('pallets.index')
        ->middleware('permission:pallets.index');

    Route::get('pallets/create', 'PalletController@create')->name('pallets.create')
        ->middleware('permission:pallets.create');

    Route::put('pallets/{pallet}', 'PalletController@update')->name('pallets.update')
        ->middleware('permission:pallets.edit');

    Route::get('pallets/{pallet}', 'PalletController@show')->name('pallets.show')
        ->middleware('permission:pallets.show');

    Route::delete('pallets/{pallet}', 'PalletController@destroy')->name('pallets.destroy')
        ->middleware('permission:pallets.destroy');

    Route::get('pallets/{pallet}/edit', 'PalletController@edit')->name('pallets.edit')
        ->middleware('permission:pallets.edit');

    // PalletItem
    Route::post('palletitems/store', 'PalletItemController@store')->name('palletitems.store')
    ->middleware('permission:palletitems.create');

    Route::get('palletitems', 'PalletItemController@index')->name('palletitems.index')
        ->middleware('permission:palletitems.index');

    Route::get('palletitems/create/{palletitem}', 'PalletItemController@create')->name('palletitems.create')
        ->middleware('permission:palletitems.create');

    Route::put('palletitems/{palletitem}', 'PalletItemController@update')->name('palletitems.update')
        ->middleware('permission:palletitems.edit');

    Route::get('palletitems/{palletitem}', 'PalletItemController@show')->name('palletitems.show')
        ->middleware('permission:palletitems.show');

    Route::delete('palletitems/{palletitem}', 'PalletItemController@destroy')->name('palletitems.destroy')
        ->middleware('permission:palletitems.destroy');

    Route::get('palletitems/{palletitem}/edit', 'PalletItemController@edit')->name('palletitems.edit')
        ->middleware('permission:palletitems.edit');

    // Sketches
    Route::post('sketches/store', 'SketchesController@store')->name('sketches.store')
    ->middleware('permission:sketches.create');

    Route::get('sketches', 'SketchesController@index')->name('sketches.index')
        ->middleware('permission:sketches.index');

    Route::get('sketches/create/{sketches}', 'SketchesController@create')->name('sketches.create')
        ->middleware('permission:sketches.create');

    Route::put('sketches/{sketches}', 'SketchesController@update')->name('sketches.update')
        ->middleware('permission:sketches.edit');

    Route::get('sketches/{sketches}', 'SketchesController@show')->name('sketches.show')
        ->middleware('permission:sketches.show');

    Route::delete('sketches/{sketches}', 'SketchesController@destroy')->name('sketches.destroy')
        ->middleware('permission:sketches.destroy');

    Route::get('sketches/{sketches}/edit', 'SketchesController@edit')->name('sketches.edit')
        ->middleware('permission:sketches.edit');

    // Invoice Header
    Route::post('invoiceh/store', 'InvoiceHeaderController@store')->name('invoiceh.store')
    ->middleware('permission:invoiceh.create');

    Route::get('invoiceh', 'InvoiceHeaderController@index')->name('invoiceh.index')
        ->middleware('permission:invoiceh.index');

    Route::get('invoiceh/create/{invoiceh}', 'InvoiceHeaderController@create')->name('invoiceh.create')
        ->middleware('permission:invoiceh.create');

    Route::put('invoiceh/{invoiceh}', 'InvoiceHeaderController@update')->name('invoiceh.update')
        ->middleware('permission:invoiceh.edit');

    Route::get('invoiceh/{invoiceh}', 'InvoiceHeaderController@show')->name('invoiceh.show')
        ->middleware('permission:invoiceh.show');

    Route::delete('invoiceh/{invoiceh}', 'InvoiceHeaderController@destroy')->name('invoiceh.destroy')
        ->middleware('permission:invoiceh.destroy');

    Route::get('invoiceh/{invoiceh}/edit', 'InvoiceHeaderController@edit')->name('invoiceh.edit')
        ->middleware('permission:invoiceh.edit');

    // Comercial Invoice Items
    Route::post('comercialinvoiveitem/store', 'ComercialInvoiceItemController@store')->name('comercialinvoiveitem.store')
    ->middleware('permission:comercialinvoiveitem.create');

    Route::get('comercialinvoiveitem', 'ComercialInvoiceItemController@index')->name('comercialinvoiveitem.index')
        ->middleware('permission:comercialinvoiveitem.index');

    Route::get('comercialinvoiveitem/create/{comercialinvoiveitem}', 'ComercialInvoiceItemController@create')->name('comercialinvoiveitem.create')
        ->middleware('permission:comercialinvoiveitem.create');

    Route::put('comercialinvoiveitem/{comercialinvoiveitem}', 'ComercialInvoiceItemController@update')->name('comercialinvoiveitem.update')
        ->middleware('permission:comercialinvoiveitem.edit');

    Route::get('comercialinvoiveitem/{comercialinvoiveitem}', 'ComercialInvoiceItemController@show')->name('comercialinvoiveitem.show')
        ->middleware('permission:comercialinvoiveitem.show');

    Route::delete('comercialinvoiveitem/{comercialinvoiveitem}', 'ComercialInvoiceItemController@destroy')->name('comercialinvoiveitem.destroy')
        ->middleware('permission:comercialinvoiveitem.destroy');

    Route::get('comercialinvoiveitem/{comercialinvoiveitem}/edit', 'ComercialInvoiceItemController@edit')->name('comercialinvoiveitem.edit')
        ->middleware('permission:comercialinvoiveitem.edit');
        
});
