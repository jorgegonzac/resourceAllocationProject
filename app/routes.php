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
Route::get('/', function(){
	return Redirect::to('login');
});
Route::get('login', 'SessionsController@create');
Route::get('logout', 'SessionsController@destroy');
Route::resource('sessions', 'SessionsController');

Route::get('index', 'StudentController@showRecent');
Route::get('index/{id}/showBookingForm', 'StudentController@showBookingForm');

Route::get('lab/{id}', 'StudentController@showLaboratoryResourcesView'); //returns a View
Route::get('lab', 'StudentController@showLaboratoryResources');	//returns html code

Route::get('search', 'StudentController@search');

Route::get('admin', 'AdminController@showAdmin');

Route::resource('users', 'UsersController');
Route::post('changeEmail','UsersController@changeEmail');

Route::resource('laboratories','LaboratoriesController');

Route::resource('categories','CategoriesController');

Route::resource('resources', 'ResourcesController');

Route::resource('timetables', 'TimetablesController');
Route::get('assign', 'TimetablesController@assign');
Route::post('assign', 'TimetablesController@showSchedules');

Route::resource('schedules', 'SchedulesController');

Route::resource('bookings', 'BookingsController');
Route::get('bookings/{id}/close','BookingsController@close');

Route::resource('waitinglists', 'WaitingListsController');

Route::post('booking','BookingsController@bookResurce');

Route::get('account', 'UsersController@showCurrent');
Route::get('activeBookings', 'BookingsController@showActiveBookings');
Route::get('activeWaiting', 'WaitingListsController@showActiveWaiting');

Route::get('users/{id}/delete', 'UsersController@destroy');



