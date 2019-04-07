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
});
