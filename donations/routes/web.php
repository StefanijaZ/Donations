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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/home', 'DonationsController@home')->name('home');
Route::post('/', 'DonationsController@saveRandom');
//Route::get('/', 'DonationsController@fillDonation');
Route::get('/', 'DonationsController@donations');
Route::get('/donations', 'DonationsController@userDonations');
Route::get('/apply/{donation}', 'DonationsController@apply');
Route::post('/apply/{donation}', 'DonationsController@saveApply');
Route::get('/select/{donation}', 'DonationsController@select');
Route::post('/select/{donation}', 'DonationsController@saveSelect');









