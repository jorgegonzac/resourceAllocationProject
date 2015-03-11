<?php

class ResourcesController extends \BaseController {

	public function showRecent(){
		$laboratories = Laboratory::lists('name');
		$bookings = Booking::with('resource')->take(4)->distinct()->get();
		return View::make('resources', ['laboratories' => $laboratories, 'recentBookings' => $bookings]);
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
