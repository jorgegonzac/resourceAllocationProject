<?php

class TimetablesController extends BaseController {

	public function index()
	{
		$timetables = Timetable::with('schedules')->get();
		return View::make('admin.timetables.index', ['timetables' => $timetables]);
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
		$timetable = Timetable::select()->where('id', '=', $id)->with('schedules')->get();
		$horas = array('08:00' => '08:00 - 08:30', '08:30' => '08:30 - 09:00', '09:00' => '09:00 - 09:30', '09:30' => '09:30 - 10:00', '10:00' => '10:00 - 10:30', '10:30' => '10:30 - 11:00', '11:00' => '11:00 - 11:30', '11:30' => '11:30 - 12:00', '12:00' => '12:00 - 12:30', '12:30' => '12:30 - 13:00', '13:00' => '13:00 - 13:30', '13:30' => '13:30 - 14:00', '14:00' => '14:00 - 14:30', '14:30' => '14:30 - 15:00', '15:00' => '15:00 - 15:30', '15:30' => '15:30 - 16:00', '16:00' => '16:00 - 16:30');
		$lunes = array('08:00 - 08:30' => false, '08:30 - 09:00' => false, '09:00 - 09:30' => false, '09:30 - 10:00' => false, '10:00 - 10:30' => false, '10:30 - 11:00' => false, '11:00 - 11:30' => false, '11:30 - 12:00' => false, '12:00 - 12:30' => false, '12:30 - 13:00' => false, '13:00 - 13:30' => false, '13:30 - 14:00' => false, '14:00 - 14:30' => false, '14:30 - 15:00' => false, '15:00 - 15:30' => false, '15:30 - 16:00' => false, '16:00 - 16:30' => false);
		$martes = array('08:00 - 08:30' => false, '08:30 - 09:00' => false, '09:00 - 09:30' => false, '09:30 - 10:00' => false, '10:00 - 10:30' => false, '10:30 - 11:00' => false, '11:00 - 11:30' => false, '11:30 - 12:00' => false, '12:00 - 12:30' => false, '12:30 - 13:00' => false, '13:00 - 13:30' => false, '13:30 - 14:00' => false, '14:00 - 14:30' => false, '14:30 - 15:00' => false, '15:00 - 15:30' => false, '15:30 - 16:00' => false, '16:00 - 16:30' => false);
		$miercoles = array('08:00 - 08:30' => false, '08:30 - 09:00' => false, '09:00 - 09:30' => false, '09:30 - 10:00' => false, '10:00 - 10:30' => false, '10:30 - 11:00' => false, '11:00 - 11:30' => false, '11:30 - 12:00' => false, '12:00 - 12:30' => false, '12:30 - 13:00' => false, '13:00 - 13:30' => false, '13:30 - 14:00' => false, '14:00 - 14:30' => false, '14:30 - 15:00' => false, '15:00 - 15:30' => false, '15:30 - 16:00' => false, '16:00 - 16:30' => false);
		$jueves = array('08:00 - 08:30' => false, '08:30 - 09:00' => false, '09:00 - 09:30' => false, '09:30 - 10:00' => false, '10:00 - 10:30' => false, '10:30 - 11:00' => false, '11:00 - 11:30' => false, '11:30 - 12:00' => false, '12:00 - 12:30' => false, '12:30 - 13:00' => false, '13:00 - 13:30' => false, '13:30 - 14:00' => false, '14:00 - 14:30' => false, '14:30 - 15:00' => false, '15:00 - 15:30' => false, '15:30 - 16:00' => false, '16:00 - 16:30' => false);
		$viernes = array('08:00 - 08:30' => false, '08:30 - 09:00' => false, '09:00 - 09:30' => false, '09:30 - 10:00' => false, '10:00 - 10:30' => false, '10:30 - 11:00' => false, '11:00 - 11:30' => false, '11:30 - 12:00' => false, '12:00 - 12:30' => false, '12:30 - 13:00' => false, '13:00 - 13:30' => false, '13:30 - 14:00' => false, '14:00 - 14:30' => false, '14:30 - 15:00' => false, '15:00 - 15:30' => false, '15:30 - 16:00' => false, '16:00 - 16:30' => false);
		$sabado = array('08:00 - 08:30' => false, '08:30 - 09:00' => false, '09:00 - 09:30' => false, '09:30 - 10:00' => false, '10:00 - 10:30' => false, '10:30 - 11:00' => false, '11:00 - 11:30' => false, '11:30 - 12:00' => false, '12:00 - 12:30' => false, '12:30 - 13:00' => false, '13:00 - 13:30' => false, '13:30 - 14:00' => false, '14:00 - 14:30' => false, '14:30 - 15:00' => false, '15:00 - 15:30' => false, '15:30 - 16:00' => false, '16:00 - 16:30' => false);
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
				while ($val_start < $val_end) {
					if(!$mediaInicio && !$mayor9Inicio){
						$arr_cmp[] = '0' . $val_start . ':00 - ' . $val_start . ':30';
						if($mediaInicio && ($val_start == 9)){
							$mayor9Inicio = 1;
						}
						$mediaInicio = 1;
					}else{
						echo '';
					}
					$val_start += 1;																					
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
