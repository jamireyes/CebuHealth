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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/restore', function(){
//     return User::withTrashed()->find(1)->restore();
// });

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
Route::get('/', '\App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Auth::routes();

// DashboardController
Route::get('Dashboard', 'DashboardController@index')->name('Dashboard');
Route::get('ClusterChart', 'DashboardController@ClusterChart')->name('ClusterChart');
Route::get('DistrictChart', 'DashboardController@DistrictChart')->name('DistrictChart');
Route::get('MLGUChart', 'DashboardController@MLGUChart')->name('MLGUChart');

// DataController
Route::post('Data/importExcel', 'DataController@importExcel')->name('Data.importExcel');
Route::get('Data/exportAll', 'DataController@exportAll')->name('Data.exportAll')->middleware(['auth']);
Route::post('Data/{Data}/restore', 'DataController@restore')->name('Data.restore')->middleware(['auth']);
Route::get('Data/create', 'DataController@create')->name('Data.create')->middleware(['auth']);
Route::post('Data', 'DataController@store')->name('Data.store')->middleware(['auth']);
Route::get('Data', 'DataController@index')->name('Data.index')->middleware(['auth', 'role:Admin']);
Route::put('Data/{Data}', 'DataController@update')->name('Data.update')->middleware(['auth']);
Route::delete('Data/{Data}', 'DataController@destroy')->name('Data.destroy')->middleware(['auth']);
Route::get('Data/{Data}/edit', 'DataController@edit')->name('Data.edit')->middleware(['auth', 'role:Admin']);
Route::get('Data/{name}/DataEntry', 'DataController@DataEntryIndex')->name('Data.DataEntryIndex')->middleware(['auth', 'role:User']);

// AccountController
Route::get('Account/exportAll', 'AccountController@exportAll')->name('Account.exportAll')->middleware(['auth', 'role:Admin']);
Route::post('Account/{Account}/restore', 'AccountController@restore')->name('Account.restore')->middleware(['auth', 'role:Admin']);
Route::resource('Account', 'AccountController')->middleware(['auth', 'role:Admin']);

