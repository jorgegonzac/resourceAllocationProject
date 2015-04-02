<?php

class TimetablesController extends BaseController {

	public function index()
	{
		$timetables = Timetable::with('schedules')->get();
		return View::make('admin.timetables.index', ['timetables' => $timetables]);
	}

	public function create()
	{
		return View::make('admin.timetables.create');
	}

	public function assign(){
		$timetables = Timetable::all();
		return View::make('admin.timetables.assign', ['timetables' => $timetables]);
	}

	public function showSchedules(){
		$id = Input::get('id');
		$timetable = Timetable::select()->where('id', '=', $id)->with('schedules')->get();
		$schedules = Schedule::all();
		$schedules_assigned = array();
		$schedules_unassigned = array();
		$schedules_id = array();
		foreach ($timetable[0]->schedules as $schedule){
			$schedules_assigned[] = $schedule;
		}
		foreach ($schedules_id as $schedule_id){
			$schedule = Schedule::select()->where('id', '=', $schedule_id)->get();
			$schedules_unassigned[] = $schedule;
		}
		$data = array('0' => $schedules_assigned, '1' => $schedules);
		return $data;
	}

	public function store()
	{
		if(Input::get('agregar')){
			//Validar si ya esta asignada
			return 'Agregar';
		}else{
			$rules = array(
	            'name'      => 'required',
	        );        
	        $messages = [
	        	'required' 	=> 'Este campo es obligatorio !',
	       	];
			$validator = Validator::make(Input::all(), $rules, $messages);
			
			if($validator->fails()){
				return Redirect::to('timetables/create')
				->withErrors($validator->messages())
				->withInput();
			}else{
				$timetable = new Timetable;
				$timetable->description  = Input::get('name');
				$timetable->save(); 
				Session::flash('message', 'Successfully created timetable!');
				return Redirect::to('timetables');
			}
		}
	}

	public function show($id)
	{
		$timetable = Timetable::select()->where('id', '=', $id)->with('schedules')->get();
		$horas = array('08:00' => '08:00 - 08:30', '08:30' => '08:30 - 09:00', '09:00' => '09:00 - 09:30', '09:30' => '09:30 - 10:00', '10:00' => '10:00 - 10:30', '10:30' => '10:30 - 11:00', '11:00' => '11:00 - 11:30', '11:30' => '11:30 - 12:00', '12:00' => '12:00 - 12:30', '12:30' => '12:30 - 13:00', '13:00' => '13:00 - 13:30', '13:30' => '13:30 - 14:00', '14:00' => '14:00 - 14:30', '14:30' => '14:30 - 15:00', '15:00' => '15:00 - 15:30', '15:30' => '15:30 - 16:00', '16:00' => '16:00 - 16:30', '16:30' => '16:30 - 17:00', '17:00' => '17:00 - 17:30', '17:30' => '17:30 - 18:00', '18:00' => '18:00 - 18:30', '18:30' => '18:30 - 19:00', '19:00' => '19:00 - 19:30', '19:30' => '19:30 - 20:00', '20:00' => '20:00 - 20:30', '20:30' => '20:30 - 21:00');
		$lunes = array('08:00 - 08:30' => false, '08:30 - 09:00' => false, '09:00 - 09:30' => false, '09:30 - 10:00' => false, '10:00 - 10:30' => false, '10:30 - 11:00' => false, '11:00 - 11:30' => false, '11:30 - 12:00' => false, '12:00 - 12:30' => false, '12:30 - 13:00' => false, '13:00 - 13:30' => false, '13:30 - 14:00' => false, '14:00 - 14:30' => false, '14:30 - 15:00' => false, '15:00 - 15:30' => false, '15:30 - 16:00' => false, '16:00 - 16:30' => false, '16:30 - 17:00' => false, '17:00 - 17:30' => false, '17:30 - 18:00' => false, '18:00 - 18:30' => false, '18:30 - 19:00' => false, '19:00 - 19:30' => false, '19:30 - 20:00' => false, '20:00 - 20:30' => false, '20:30 - 21:00' => false);
		$martes = array('08:00 - 08:30' => false, '08:30 - 09:00' => false, '09:00 - 09:30' => false, '09:30 - 10:00' => false, '10:00 - 10:30' => false, '10:30 - 11:00' => false, '11:00 - 11:30' => false, '11:30 - 12:00' => false, '12:00 - 12:30' => false, '12:30 - 13:00' => false, '13:00 - 13:30' => false, '13:30 - 14:00' => false, '14:00 - 14:30' => false, '14:30 - 15:00' => false, '15:00 - 15:30' => false, '15:30 - 16:00' => false, '16:00 - 16:30' => false, '16:30 - 17:00' => false, '17:00 - 17:30' => false, '17:30 - 18:00' => false, '18:00 - 18:30' => false, '18:30 - 19:00' => false, '19:00 - 19:30' => false, '19:30 - 20:00' => false, '20:00 - 20:30' => false, '20:30 - 21:00' => false);
		$miercoles = array('08:00 - 08:30' => false, '08:30 - 09:00' => false, '09:00 - 09:30' => false, '09:30 - 10:00' => false, '10:00 - 10:30' => false, '10:30 - 11:00' => false, '11:00 - 11:30' => false, '11:30 - 12:00' => false, '12:00 - 12:30' => false, '12:30 - 13:00' => false, '13:00 - 13:30' => false, '13:30 - 14:00' => false, '14:00 - 14:30' => false, '14:30 - 15:00' => false, '15:00 - 15:30' => false, '15:30 - 16:00' => false, '16:00 - 16:30' => false, '16:30 - 17:00' => false, '17:00 - 17:30' => false, '17:30 - 18:00' => false, '18:00 - 18:30' => false, '18:30 - 19:00' => false, '19:00 - 19:30' => false, '19:30 - 20:00' => false, '20:00 - 20:30' => false, '20:30 - 21:00' => false);
		$jueves = array('08:00 - 08:30' => false, '08:30 - 09:00' => false, '09:00 - 09:30' => false, '09:30 - 10:00' => false, '10:00 - 10:30' => false, '10:30 - 11:00' => false, '11:00 - 11:30' => false, '11:30 - 12:00' => false, '12:00 - 12:30' => false, '12:30 - 13:00' => false, '13:00 - 13:30' => false, '13:30 - 14:00' => false, '14:00 - 14:30' => false, '14:30 - 15:00' => false, '15:00 - 15:30' => false, '15:30 - 16:00' => false, '16:00 - 16:30' => false, '16:30 - 17:00' => false, '17:00 - 17:30' => false, '17:30 - 18:00' => false, '18:00 - 18:30' => false, '18:30 - 19:00' => false, '19:00 - 19:30' => false, '19:30 - 20:00' => false, '20:00 - 20:30' => false, '20:30 - 21:00' => false);
		$viernes = array('08:00 - 08:30' => false, '08:30 - 09:00' => false, '09:00 - 09:30' => false, '09:30 - 10:00' => false, '10:00 - 10:30' => false, '10:30 - 11:00' => false, '11:00 - 11:30' => false, '11:30 - 12:00' => false, '12:00 - 12:30' => false, '12:30 - 13:00' => false, '13:00 - 13:30' => false, '13:30 - 14:00' => false, '14:00 - 14:30' => false, '14:30 - 15:00' => false, '15:00 - 15:30' => false, '15:30 - 16:00' => false, '16:00 - 16:30' => false, '16:30 - 17:00' => false, '17:00 - 17:30' => false, '17:30 - 18:00' => false, '18:00 - 18:30' => false, '18:30 - 19:00' => false, '19:00 - 19:30' => false, '19:30 - 20:00' => false, '20:00 - 20:30' => false, '20:30 - 21:00' => false);
		$sabado = array('08:00 - 08:30' => false, '08:30 - 09:00' => false, '09:00 - 09:30' => false, '09:30 - 10:00' => false, '10:00 - 10:30' => false, '10:30 - 11:00' => false, '11:00 - 11:30' => false, '11:30 - 12:00' => false, '12:00 - 12:30' => false, '12:30 - 13:00' => false, '13:00 - 13:30' => false, '13:30 - 14:00' => false, '14:00 - 14:30' => false, '14:30 - 15:00' => false, '15:00 - 15:30' => false, '15:30 - 16:00' => false, '16:00 - 16:30' => false, '16:30 - 17:00' => false, '17:00 - 17:30' => false, '17:30 - 18:00' => false, '18:00 - 18:30' => false, '18:30 - 19:00' => false, '19:00 - 19:30' => false, '19:30 - 20:00' => false, '20:00 - 20:30' => false, '20:30 - 21:00' => false);
		foreach ($timetable[0]->schedules as $schedule){
			$weekday = $schedule->weekday;
			$startHour = $schedule->start_hour;
			$endHour = $schedule->end_hour;
			if ($startHour[3] == '3'){
				$mediaInicio = 1;
			}else{
				$mediaInicio = 0;
			}
			if($endHour[3] == '3'){
				$mediaFin = 1;
			}else{
				$mediaFin = 0;
			}
			$startHour = substr($startHour, 0, -3);
			$endHour = substr($endHour, 0, -3);
			if($startHour[0] == '0'){
				$mayor9Inicio = 0;
				$val_start = intval($startHour[1]);
			}else{
				$mayor9Inicio = 1;
				$val_start = intval($startHour[0] . $startHour[1]);
			}
			if($endHour[0] == '0'){
				$mayor9Fin = 0;
				$val_end = intval($endHour[1]);
			}else{
				$mayor9Fin = 1;
				$val_end = intval($endHour[0] . $endHour[1]);
			}
			$arr_cmp = array();
			if($val_start == $val_end){
				if($mayor9Inicio){
					$arr_cmp[] = $val_start . ':00 - ' . $val_end . ':30' ;
				}else{
					$arr_cmp[] = '0' . $val_start . ':00 - 0' . $val_end . ':30' ;
				}
			}else{
				while ($val_start < $val_end){
					if(!$mediaInicio && !$mayor9Inicio){
						$arr_cmp[] = '0' . $val_start . ':00 - 0' .$val_start . ':30';
						$mediaInicio = 1;
					}else if($mediaInicio && !$mayor9Inicio){
						$aux = $val_start+1;
						if($aux > 9){
							$mayor9Inicio = 1;
							$arr_cmp[] = '0' . $val_start . ':30 - ' . $aux . ':00';
						}else{
							$arr_cmp[] = '0' . $val_start . ':30 - 0' . $aux . ':00';	
						}
						$mediaInicio = 0;
						$val_start++;
					}else if(!$mediaInicio && $mayor9Inicio){
						$arr_cmp[] = $val_start . ':00 - ' .$val_start . ':30';
						$mediaInicio = 1;
					}else if($mediaInicio && $mayor9Inicio){
						$aux = $val_start+1;
						$arr_cmp[] = $val_start . ':30 - ' . $aux . ':00';
						$mediaInicio = 0;
						$val_start++;
					}
				}
				if (($val_start == $val_end) && $mediaFin){
					if ($val_start < 10){
						$arr_cmp[] = '0' . $val_start . ':00 - 0' .$val_start . ':30';
					}else{
						$arr_cmp[] = $val_start . ':00 - ' .$val_start . ':30';
					}
				}
			}
			foreach ($arr_cmp as $key => $value){
				switch ($weekday) {
					case 'Lunes':
						$lunes[$value] = 1;
						break;

					case 'Martes':
						$martes[$value] = 1;
						break;

					case 'Miercoles':
						$miercoles[$value] = 1;
						break;

					case 'Jueves':
						$jueves[$value] = 1;
						break;

					case 'Viernes':
						$viernes[$value] = 1;
						break;

					case 'Sabado':
						$sabado[$value] = 1;
						break;
					
					default:
						break;
				}
			}
		}
		return View::make('admin.timetables.show',['timetable' => $timetable, 'horas' => $horas, 'lunes' => $lunes, 'martes' => $martes, 'miercoles' => $miercoles, 'jueves' => $jueves, 'viernes' => $viernes, 'sabado' => $sabado]);
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
		$timetable = Timetable::find($id);
		$relations = DB::table('timetables_schedules')->select()->where('timetable_id','=',$id)->get();
		foreach ($relations as $relation) {
			$query = DB::table('timetables_schedules')->select()->where('id', '=', $relation->id)->delete();
		}
		$timetable->delete();
		return Redirect::to('timetables');
	}

}
