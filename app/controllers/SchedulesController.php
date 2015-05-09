<?php

class SchedulesController extends BaseController {

	public function index()
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$schedules = Schedule::all();
			return View::make('admin.schedules.index', ['schedules' => $schedules]);
		}else{
			return Redirect::to('login');
		}
	}

	public function create()
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$horasInicio = array('8:00' => '8:00', '8:30' => '8:30', '9:00' => '9:00', '9:30' => '9:30', '10:00' => '10:00', '10:30' => '10:30', '11:00' => '11:00', '11:30' => '11:30', '12:00' => '12:00', '12:30' => '12:30', '13:00' => '13:30', '14:00' => '14:00', '14:30' => '14:30', '15:00' => '15:00', '15:30' => '15:30', '16:00' => '16:00', '16:30' => '16:30', '17:00' => '17:00', '17:30' => '17:30', '18:00' => '18:00', '18:30' => '18:30', '19:00' => '19:00', '19:30' => '19:30', '20:00' => '20:00', '20:30' => '20:30');
			$horasFin = array('8:30' => '8:30', '9:00' => '9:00', '9:30' => '9:30', '10:00' => '10:00', '10:30' => '10:30', '11:00' => '11:00', '11:30' => '11:30', '12:00' => '12:00', '12:30' => '12:30', '13:00' => '13:30', '14:00' => '14:00', '14:30' => '14:30', '15:00' => '15:00', '15:30' => '15:30', '16:00' => '16:00', '16:30' => '16:30', '17:00' => '17:00', '17:30' => '17:30', '18:00' => '18:00', '18:30' => '18:30', '19:00' => '19:00', '19:30' => '19:30', '20:00' => '20:00', '20:30' => '20:30', '21:00' => '21:00');
			return View::make('admin.schedules.create', ['horasInicio' => $horasInicio, 'horasFin' => $horasFin]);
		}else{
			return Redirect::to('login');
		}
	}

	public function store()
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$rules = array(
	            'name'      => 'required',
	        );        

	        $messages = [
	        	'required' 	=> 'Este campo es obligatorio',
	       	];
			$validator = Validator::make(Input::only('name'), $rules, $messages);
			$weekday = Input::get('day');
			$startHour = Input::get('hora_inicio');
			$endHour = Input::get('hora_fin');
			if (strlen($startHour) == 4){
				if ($startHour[2] == '3'){
					$startAux = intval($startHour[0]) + 0.5;	
				}else{
					$startAux = intval($startHour[0]);
				}
			}else{
				if ($startHour[3] == '3'){
					$startAux = intval($startHour[0].$startHour[1]) + 0.5;	
				}else{
					$startAux = intval($startHour[0].$startHour[1]);
				}
			}

			if (strlen($endHour) == 4){
				if ($endHour[2] == '3'){
					$endAux = intval($endHour[0]) + 0.5;	
				}else{
					$endAux = intval($endHour[0]);
				}
			}else{
				if ($endHour[3] == '3'){
					$endAux = intval($endHour[0].$endHour[1]) + 0.5;	
				}else{
					$endAux = intval($endHour[0].$endHour[1]);
				}
			}

			if(($startAux < $endAux) && (!$validator->fails())){
				$schedule = new Schedule;
				$schedule->name		=	Input::get('name');
				$schedule->start_hour = $startHour;
				$schedule->end_hour = $endHour;
				$schedule->weekday = $weekday;
				$schedule->save();
				Session::flash('message', 'Successfully created schedule!');
				return Redirect::to('schedules');
			}else if(($startAux < $endAux) && ($validator->fails())){
				return Redirect::back()
				->withErrors($validator->messages())
				->withInput();
			}else if(!($startAux < $endAux) && !($validator->fails())){
				return Redirect::back()
				->withInput()
				->withErrors(['invalid_hour' => 'La hora de inicio debe ser menor a la hora de fin.']);
			}else{
				return Redirect::back()
				->withErrors(['name' => 'Este campo es obligatorio', 
					'invalid_hour' => 'La hora de inicio debe ser menor a la hora de fin.'])
				->withInput();
			}
		}else{
			return Redirect::to('login');
		}
	}

	public function show($id)
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$schedule = Schedule::find($id);
			return View::make('admin.schedules.show')->with('schedule',$schedule);
		}else{
			return Redirect::to('login');
		}
	}

	public function edit($id)
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$horasInicio = array('8:00' => '8:00', '8:30' => '8:30', '9:00' => '9:00', '9:30' => '9:30', '10:00' => '10:00', '10:30' => '10:30', '11:00' => '11:00', '11:30' => '11:30', '12:00' => '12:00', '12:30' => '12:30', '13:00' => '13:30', '14:00' => '14:00', '14:30' => '14:30', '15:00' => '15:00', '15:30' => '15:30', '16:00' => '16:00', '16:30' => '16:30', '17:00' => '17:00', '17:30' => '17:30', '18:00' => '18:00', '18:30' => '18:30', '19:00' => '19:00', '19:30' => '19:30', '20:00' => '20:00', '20:30' => '20:30');
			$horasFin = array('8:30' => '8:30', '9:00' => '9:00', '9:30' => '9:30', '10:00' => '10:00', '10:30' => '10:30', '11:00' => '11:00', '11:30' => '11:30', '12:00' => '12:00', '12:30' => '12:30', '13:00' => '13:30', '14:00' => '14:00', '14:30' => '14:30', '15:00' => '15:00', '15:30' => '15:30', '16:00' => '16:00', '16:30' => '16:30', '17:00' => '17:00', '17:30' => '17:30', '18:00' => '18:00', '18:30' => '18:30', '19:00' => '19:00', '19:30' => '19:30', '20:00' => '20:00', '20:30' => '20:30', '21:00' => '21:00');
			$schedule = Schedule::find($id);
			return View::make('admin.schedules.edit',['horasInicio' => $horasInicio, 'horasFin' => $horasFin, 'schedule' => $schedule]);
		}else{
			return Redirect::to('login');
		}
	}

	public function update($id)
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$rules = array(
	            'name'      => 'required',
	        );        

	        $messages = [
	        	'required' 	=> 'Este campo es obligatorio',
	       	];
			$validator = Validator::make(Input::only('name'), $rules, $messages);
			$weekday = Input::get('day');
			$startHour = Input::get('hora_inicio');
			$endHour = Input::get('hora_fin');
			if (strlen($startHour) == 4){
				if ($startHour[2] == '3'){
					$startAux = intval($startHour[0]) + 0.5;	
				}else{
					$startAux = intval($startHour[0]);
				}
			}else{
				if ($startHour[3] == '3'){
					$startAux = intval($startHour[0].$startHour[1]) + 0.5;	
				}else{
					$startAux = intval($startHour[0].$startHour[1]);
				}
			}

			if (strlen($endHour) == 4){
				if ($endHour[2] == '3'){
					$endAux = intval($endHour[0]) + 0.5;	
				}else{
					$endAux = intval($endHour[0]);
				}
			}else{
				if ($endHour[3] == '3'){
					$endAux = intval($endHour[0].$endHour[1]) + 0.5;	
				}else{
					$endAux = intval($endHour[0].$endHour[1]);
				}
			}

			if(($startAux < $endAux) && (!$validator->fails())){
				$schedule = Schedule::find($id);
				$schedule->name		=	Input::get('name');
				$schedule->start_hour = $startHour;
				$schedule->end_hour = $endHour;
				$schedule->weekday = $weekday;
				$schedule->save();
				Session::flash('message', 'Successfully updated schedule');
				return Redirect::to('schedules');
			}else if(($startAux < $endAux) && ($validator->fails())){
				return Redirect::back()
				->withErrors($validator->messages())
				->withInput();
			}else if(!($startAux < $endAux) && !($validator->fails())){
				return Redirect::back()
				->withInput()
				->withErrors(['invalid_hour' => 'La hora de inicio debe ser menor a la hora de fin.']);
			}else{
				return Redirect::back()
				->withErrors(['name' => 'Este campo es obligatorio', 
					'invalid_hour' => 'La hora de inicio debe ser menor a la hora de fin.'])
				->withInput();
			}		
		}else{
			return Redirect::to('login');
		}
	}

	public function destroy($id)
	{
		if (Session::get('school_id') && Session::get('role')==1)
		{
			$schedule = Schedule::find($id);
			$schedule->delete();
			return Redirect::to('schedules');
		}else{
			return Redirect::to('login');
		}
	}
}
