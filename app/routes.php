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

Route::get('inicio', 'SectionsController@showRecent');
Route::post('inicio', 'SectionsController@showLaboratoryResources');

Route::get('admin', 'SectionsController@showAdmin');

Route::get('usuarios', 'SectionsController@showUsers');

Route::get('laboratorios', 'SectionsController@showLaboratories');

Route::get('categorias', 'SectionsController@showCategories');

Route::get('recursos', 'SectionsController@showResources');

Route::get('calendarios', 'SectionsController@showTimetables');

Route::get('horarios', 'SectionsController@showSchedules');

Route::get('reservaciones', 'SectionsController@showBookings');

Route::get('listas-de-espera', 'SectionsController@showWaitingLists');

Route::resource('users', 'UsersController');