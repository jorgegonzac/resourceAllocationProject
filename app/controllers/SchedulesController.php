<?php

class SchedulesController extends BaseController {

	public function index()
	{
		$schedules = Schedule::all();
		return View::make('admin.schedules.index', ['schedules' => $schedules]);
	}

	public function create()
	{
		return View::make('admin.schedules.create');
	}

	public function store()
	{
		$rules = array(
            'name'      => 'required',
        );        

        $messages = [
        	'required' 	=> 'Este campo es obligatorio!',
       	];
		$validator = Validator::make(Input::only('name'), $rules, $messages);
		$weekday = Input::get('day');
		$startHour = Input::get('inicio');
		$endHour = Input::get('fin');
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
			Session::flash('message', 'Successfully created category!');
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
			->withErrors(['name' => 'Este campo es obligatorio!', 
				'invalid_hour' => 'La hora de inicio debe ser menor a la hora de fin.'])
			->withInput();
		}
	}

	public function show($id)
	{
		$schedule = Schedule::find($id);
		return View::make('admin.schedules.show')->with('schedule',$schedule);
	}

	public function edit($id)
	{
		$schedule = Schedule::find($id);
		return View::make('admin.schedules.edit')->with('schedule',$schedule);
	}

	public function update($id)
	{
		return "Edit";
	}

	public function destroy($id)
	{
		$schedule = Schedule::find($id);
		$schedule->delete();
		return Redirect::to('schedules');
	}


}
