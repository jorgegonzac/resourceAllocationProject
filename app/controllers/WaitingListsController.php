<?php

class WaitinglistsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			if(Session::get('super')==1){
				$waitings = DB::table('waitinglists')
					->join('resources','resources.id', '=', 'waitinglists.resource_id')
					->select('name','user_id','start_date','end_date','waitinglists.id')
					->get();
			}else{
				$waitings = DB::table('waitinglists')
					->join('resources','resources.id', '=', 'waitinglists.resource_id')
					->select('name','user_id','start_date','end_date','waitinglists.id')
					->where('laboratory_id','=',Session::get('lab_id'))
					->get();
			}
			//$waitings = Waitinglist::orderBy('start_date', 'desc')->get();

			

			return View::make('admin.waitinglists.index', array('waitings' => $waitings));
		}else{
			return Redirect::to('login');
		}
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
		if (Session::get('school_id') && Session::get('role')==1)
		{
		//
			$waiting = Waitinglist::find($id);
			$waiting->delete();
			return Redirect::to('waitinglists');
		}else{
			return Redirect::to('login');
		}
	}
/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function showActiveWaiting()
	{
		if (Session::get('school_id') && Session::get('role')==2)
		{
			$id = Session::get('school_id');

			$active = Waitinglist::where('user_id', '=', $id)->
						where('end_date', '>=',new DateTime('today'))->
						leftJoin('resources', 'waitinglists.resource_id', '=', 'resources.id')->get();
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
	
		}else{
			return Redirect::to('login');
		}

	}


}
