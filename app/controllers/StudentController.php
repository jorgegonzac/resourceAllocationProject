<?php

class StudentController extends \BaseController {

	public function showRecent()
	{
		if (Session::get('school_id'))
		{
			$bookings = Booking::with('resource')->distinct()->orderBy('id', 'DESC')->take(8)->get();
			$recents = array();
			foreach($bookings as $booking){
				$recent = Resource::where('id', '=', $booking->resource_id)->get();
				$recents = array_add($recents, $booking->resource_id, $recent[0]);
			}
			return View::make('student.index', ['recentBookings' => $recents]);
		}else{
			return Redirect::to('login');
		}
	}

	public function showLaboratoryResources()
	{
		$returnResources = Input::get('returnResources');
		if($returnResources){
			//RECUPERA ID LAB
			$id = Input::get('id');
			$returnAll = Input::get('returnAll');
			if ($returnAll){
				//Todos los laboratorios
				return $resources = Resource::all();
			}else{
				//SACA RECURSOS DE LABORATORIO ESPECIFICO
				return $resources = Resource::where('laboratory_id', '=', $id)->get();				
			}
		}else{
			//NO ES EL POST DE LOS LABORATORIOS
		}
	}

	public function showBookingForm($id){
		$resource = Resource::find($id);
		$category = Category::find($resource->category_id);
		$timetables = $resource->timetables;
		$bookings =	Booking::where('resource_id','=',$resource->id)->get();
		$data = array(
		    'resource'		=>	$resource,
		    'category'		=>	$category,
		    'timetables'	=>  $timetables,
		    'bookings'		=>	$bookings,
		);
		return View::make('student.booking')->with($data);
	}


}
