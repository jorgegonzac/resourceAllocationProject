<?php

class WaitingListsController extends \BaseController {

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
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showActiveWaiting()
	{
		$id = Session::get('school_id');

		$active = Waitinglist::where('user_id', '=', $id)->leftJoin('resources', 'waitinglists.resource_id', '=', 'resources.id')->get();
		$userActive= "<h3>Reservaciones en espera</h3><br>";
		
		if ($active->isEmpty()) {

			return $userActive .="<br><br><p>No cuenta con reservaciones en espera. </p>";

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
