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
	 * Display the active bookings of the current user.
	 *
	 *
	 * @return Response
	 */
	public function showActiveBookings()
	{
		// date_default_timezone_set("Mexico/General");
		// $today=date(" l d-m-Y H:i:s");
		$resource_name="";
		$image="";
		$id = Session::get('school_id');
		$active = Booking::where('return_date', '=', '0000-00-00 00:00:00')->
							where('end_date', '>=',new DateTime('today'))->
							where('user_id', '=', $id)->
							leftJoin('resources', 'bookings.resource_id', '=', 'resources.id')->get();
		$userActive= "<h3>Reservaciones Activas</h3><br>";
		
		if ($active->isEmpty()) {

			return $userActive .="<br><br><p>No cuenta con reservaciones activas. </p>";
			// echo "EMPTY";

		}

		$userActive .= 	"<div class=\"table-responsive\"><table id=\"myTable\" class=\"display table\" width=\"100%\" >";
		$userActive .=  "<thead>
		        <tr>
		            <td>Recurso</td>
		            <td>Imagen</td>
		            <td>Fecha</td>
		            <td>Hora de inicio</td>
		            <td>Hora de finalización</td>
		        </tr>
		    </thead>
		    <tbody>";
		foreach($active as $act){

			$resource_name= $act->name;
			$image = $act->image;

			$start_date=$act->start_date;
			$end_date=$act->end_date;

			$start_arr = explode(" ", $start_date);
			$end_arr = explode(" ", $end_date);

			$date = date_create($start_arr[0]);
			$date = date_format($date, 'd-m-Y');

			$userActive.= "<tr>
		            <td>".$resource_name."</td>
		            <td><img src=\"".$image." \"style=\"width:60px;height:60px\"/></td>
		            <td>".$date."</td>
		            <td>".$start_arr[1]."</td>
		            <td>".$end_arr[1]."</td>";

		            

		}
		$userActive.="</tr></tbody></table></div>";
		return $userActive; 
		// return $active;
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
