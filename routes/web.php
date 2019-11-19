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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/karyawan', 'KaryawanController@index');
Route::get('/karyawan/create', 'KaryawanController@create');
Route::post('/karyawan', 'KaryawanController@store');
Route::get('/karyawan/edit/{id}','karyawanController@edit');
Route::put('/karyawan', 'karyawanController@update');
Route::get('/karyawan/delete/{id}','KaryawanController@destroy');

Route::get('/department','DepartmentController@index');
Route::get('/department/edit/{id}','DepartmentController@edit');
Route::get('/department/create', 'DepartmentController@create');
Route::post('/department', 'DepartmentController@store');
Route::put('/department', 'DepartmentController@update');
Route::get('/department/delete/{id}','DepartmentController@destroy');
Route::get('/department/show/{id}','DepartmentController@show');

Route::get('/position','PositionController@index');
Route::get('/position/edit/{id}','PositionController@edit');
Route::get('/position/create', 'PositionController@create');
Route::post('/position', 'PositionController@store');
Route::put('/position', 'PositionController@update');
Route::get('/position/delete/{id}','PositionController@destroy');

Route::get('/employee','EmployeeController@index');
Route::get('/employee/edit/{id}','EmployeeController@edit');
Route::get('/employee/create', 'EmployeeController@create');
Route::post('/employee', 'EmployeeController@store');
Route::put('/employee', 'EmployeeController@update');
Route::get('/employee/delete/{id}','EmployeeController@destroy');
Route::get('/employee/show/{id}','EmployeeController@show');

Route::get('/inventory','InventoryController@index');
Route::get('/inventory/edit/{id}','InventoryController@edit');
Route::get('/inventory/create', 'InventoryController@create');
Route::post('/inventory', 'InventoryController@store');
Route::put('/inventory', 'InventoryController@update');
Route::get('/inventory/delete/{id}','InventoryController@destroy');
Route::get('/inventory/show/{id}','InventoryController@show');


Route::get('/archive','ArchiveController@index');
Route::get('/archive/edit/{id}','ArchiveController@edit');
Route::get('/archive/create', 'ArchiveController@create');
Route::post('/archive', 'ArchiveController@store');
Route::put('/archive', 'ArchiveController@update');
Route::get('/archive/delete/{id}','ArchiveController@destroy');

Auth::routes();

