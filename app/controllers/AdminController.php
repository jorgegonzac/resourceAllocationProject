<?php

class AdminController extends \BaseController {

	public function showAdmin()
	{
		$count=0;
		if (Session::get('school_id') && Session::get('role')==1)
		{
			
			$lab_id = Session::get('lab_id');
			//$total = DB::select('call ResourceTotal(' . $lab_id . ')');
			$total = DB::select('CALL ResourceTotal(?)',array($lab_id));
			$resources= array();
			$totals = array();
			foreach($total as $t){

				$resource_name = $t->name;
				$resource_count = $t->total;
				$resources = array_add($resources,$count,$resource_name);
				$totals = array_add($totals,$count,$resource_count);
				$count++;
			}
			return View::make('admin.index',['resource' => $resources],['total' => $totals]);
			
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
