<?php

class ResourcesController extends \BaseController {

	public function showRecent(){
		$laboratories = Laboratory::lists('name');
		$bookings = Booking::with('resource')->orderBy('id', 'DESC')->take(4)->get();
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
