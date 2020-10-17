<?php

use Illuminate\Support\Facades\Route;


// home
Route::get('/', 'ControlResours@index')->name('homepage');

// email verify
Auth::routes(['verify' => true]);

// sign out
Route::get('logout', 'LoginController@logout')->name('logout')->middleware('auth');

// admission to the data after confirmation of the email
Route::get('/user_home', 'HomeController@index')->middleware('verified')->name('account');

// edit account
Route::post('/user_home', 'ControlResours@edit')->name('edit')->middleware('auth');

// update month inform
Route::post('/user_home/add_sum', 'ControlResours@update')->name('add')->middleware('auth');

// delete account
Route::get('/return_to_home/{id}', 'ControlResours@destroy')->name('delete')->middleware('auth');

// All records/years
Route::get('/all_records/years', 'ControlResours@show')->name('all')->middleware('auth');

// All records/months
Route::get('/all_records{id}/months', 'ControlResours@show_months')->name('all_months')->middleware('auth');

// All records/days
Route::get('all_records{id}/days', 'ControlResours@show_days')->name('all_days')->middleware('auth');

// All records/costs
Route::get('all_records{id}/costs', 'ControlResours@show_costs')->name('all_costs')->middleware('auth');

// Page add cost
Route::get('create_cost', 'ControlResours@create')->name('create')->middleware('auth');

// add cost form
Route::post('/cost_add', 'ControlResours@created')->name('added')->middleware('auth');

// crate mail
Route::get('/create_mail', 'ControlResours@create_mail')->name('crate_mail')->middleware('auth');

// send mail
Route::post('send-maile','Mailsend@mailsend')->name('send');
