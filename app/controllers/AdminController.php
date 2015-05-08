<?php

class AdminController extends \BaseController {

	public function showAdmin()
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			return View::make('admin.index');
		}else{
			return Redirect::to('login');
		}
	}

	public function showUsers()
	{
		return View::make('admin.users');
	}

	public function showLaboratories()
	{
		return View::make('admin.laboratories');
	}

	public function showCategories()
	{
		return View::make('admin.categories');
	}

	public function showResources()
	{
		return View::make('admin.resources');
	}

	public function showTimetables()
	{
		return View::make('admin.timetables');
	}

	public function showSchedules()
	{
		return View::make('admin.schedules');
	}

	public function showBookings()
	{
		return View::make('admin.bookings');
	}

	public function showWaitingLists()
	{
		return View::make('admin.waitinglists');
	}

}
