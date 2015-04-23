<?php

class StudentController extends \BaseController {

	public function search(){
		$word = Input::get('label');
		$wordToFind = '%'.$word.'%';
		$resources = Resource::where('tags','LIKE',$wordToFind)->orWhere('name','LIKE',$wordToFind)->get();
		$msg;
		if(count($resources)==0){
			$msg = "No se encontraron resultados";
		}else{
			$msg = "Resultado de la búsqueda con: ".$word;
		}
		return View::make('student.index', ['bookings' => $resources, 'msg' => $msg]);
	}
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
			return View::make('student.index', ['bookings' => $recents, 'msg' => 'Recursos Usados Recientemente']);
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
			$resources;
			$msg;
			if ($returnAll){
				//Todos los laboratorios
				$resources = Resource::all();
				$msg = "Todos los laboratorios";
			}else{
				//SACA RECURSOS DE LABORATORIO ESPECIFICO
				$resources = Resource::where('laboratory_id', '=', $id)->get();				
				$lab = Laboratory::find($id);
				$msg = "Laboratorio: ".$lab->name;
			}
				$returnHTML = View::make('student.resources', ['bookings' => $resources, 'msg' => $msg]);
				return $returnHTML;
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
