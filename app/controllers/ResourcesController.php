<?php

class ResourcesController extends \BaseController {

	public function showRecent()
	{
		$laboratories = Laboratory::all();
		$bookings = Booking::with('resource')->distinct()->take(4)->get();
		$resources = Resource::all();
		return View::make('resources', ['laboratories' => $laboratories, 'recentBookings' => $bookings, 'resourcesAll' => $resources]);
	}

	public function index()
	{
		//
	}

	public function create()
	{
		//
	}

	public function store()
	{
		//
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		//
	}

	public function update($id)
	{
		//
	}

	public function destroy($id)
	{
		//
	}


}
