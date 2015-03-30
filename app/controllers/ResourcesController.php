<?php

<<<<<<< HEAD
class ResourcesController extends \BaseController {

	public function showRecent()
	{
		$laboratories = Laboratory::all();
		$bookings = Booking::distinct()->orderBy('id', 'DESC')->take(8)->get();
		$recents = array();
		foreach($bookings as $booking){
			$recent = Resource::where('id', '=', $booking->resource_id)->get();
			$recents = array_add($recents, $booking->resource_id, $recent[0]);
		}
		return View::make('resources', ['laboratories' => $laboratories, 'recentBookings' => $recents, 'bookings' => $bookings]);
	}
=======
class ResourcesController extends BaseController {
>>>>>>> develop

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
