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
Route::get('/home', 'HomeController@index')->name('home');
Route::resource('Data', 'DataController')->middleware('auth', 'user', 'admin');
Route::get('Account', 'AccountController@getUsers')->name('getUsers')->middleware('auth', 'admin');
Route::resource('Account', 'AccountController')->middleware('auth', 'admin');


// Route::get('/restoreAdmin', function(){
//     $user = User::withTrashed()->where('id', 1)->restore();
// });
