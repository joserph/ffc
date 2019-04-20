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
        
});
