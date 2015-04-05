<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');


Route::get('index', 'SectionsController@showRecent');
Route::post('index', 'SectionsController@showLaboratoryResources');
Route::get('index/{id}/showBookingForm', 'SectionsController@showBookingForm');

Route::get('admin', 'SectionsController@showAdmin');

Route::resource('users', 'UsersController');

Route::resource('laboratories','LaboratoriesController');

Route::resource('categories','CategoriesController');

Route::resource('resources', 'ResourcesController');

Route::resource('timetables', 'TimetablesController');
Route::get('assign', 'TimetablesController@assign');
Route::post('assign', 'TimetablesController@showSchedules');

Route::resource('schedules', 'SchedulesController');

Route::resource('bookings', 'SectionsController@showBookings');

Route::resource('waitinglists', 'SectionsController@showWaitingLists');

Route::resource('book', 'ResourcesController@book');

Route::post('booking','BookingsController@bookResurce');




