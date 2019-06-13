<?php

use App\User;
use Illuminate\Database\Eloquent\SoftDeletes;
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
Route::get('dashboard', 'DashboardController@index')->name('Dashboard');

// DataController
Route::get('Data/export', 'DataController@export')->name('Data.export')->middleware(['auth', 'admin']);
Route::post('Data/{Data}/restore', 'DataController@restore')->name('Data.restore');
Route::get('Data/create', 'DataController@create')->name('Data.create')->middleware(['auth']);
Route::post('Data', 'DataController@store')->name('Data.store')->middleware(['auth', 'admin']);
Route::get('Data', 'DataController@index')->name('Data.index')->middleware(['auth', 'admin']);
Route::get('Data/{Data}', 'DataController@show')->name('Data.show')->middleware(['auth', 'admin']);
Route::put('Data/{Data}', 'DataController@update')->name('Data.update')->middleware(['auth', 'admin']);
Route::delete('Data/{Data}', 'DataController@destroy')->name('Data.destroy')->middleware(['auth', 'admin']);
Route::get('Data/{Data}/edit', 'DataController@edit')->name('Data.edit')->middleware(['auth', 'admin']);

// AccountController
Route::post('Account/export', 'AccountController@export')->name('Account.export')->middleware(['auth', 'admin']);
Route::post('Account/{Account}/restore', 'AccountController@restore')->name('Account.restore');
Route::resource('Account', 'AccountController');

