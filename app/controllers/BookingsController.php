<?php

class BookingsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}
	
	/**
	* Store a newly created booking
	* @return Response
	*/
	public function bookResurce(){
		$schedules 		= Input::get('schedules');
		$resource_id 	= Input::get('resource_id');
		$user_id		= Session::get('school_id');
		$message	= "";
		$waiting_msg	= "<h3>En lista de espera: <br></h3>";
		$booking_msg	= "<h3>Reservas hechas: <br></h3>";
		if( !isset($schedules) or is_null($schedules)){
			return "<h1>Error: ningún horario fue seleccionado<h1>";
		}
		foreach ($schedules as $key => $schedule) {
			$aux = explode("%", $schedule);	//$aux[0] = type, $aux[1] = date
			//if this schedule needs to be put in waiting list because of an actual booking
			if($aux[0] == "w"){
				//save it on waiting list
				$waitinglist = new Waitinglist();
				$waitinglist->resource_id	=	$resource_id;
				$waitinglist->user_id		=	$user_id;
				$waitinglist->start_date 	= 	$aux[1];
				$waitinglist->end_date		=	$aux[2];
				$waitinglist->save();
				$waiting_msg .= "<h4>" . $aux[1] . " - " . $aux[2] . "</h4> <br>";
			}else{
				//save it on bookings
				$booking 	= new Booking();
				$booking->resource_id	=	$resource_id;
				$booking->user_id		=	$user_id;
				$booking->start_date 	=	$aux[1];
				$booking->end_date		=	$aux[2];
				$booking->save();
				$booking_msg .= "<h4>" . $aux[1] . " - " . $aux[2] . "</h4> <br>";
			}
		}
		$message .= $waiting_msg.$booking_msg;
		return $message;
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
