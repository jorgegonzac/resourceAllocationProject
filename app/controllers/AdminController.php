<?php

class AdminController extends \BaseController {

	public function showAdmin()
	{
		$count=0;
		if (Session::get('school_id') && Session::get('role')==1)
		{ 

			if(Session::get('super') == 1){

				$totalRec = DB::select('CALL ResourceTotalSuper()');
				$totalCat = DB::select('CALL CategoryTotal_super()');
				$totalUseSup = DB::select('CALL UserTotal_super()');
				$totalMonth = DB::select('CALL monthTotal_super()');
				$totalDay = DB::select('CALL DayTotal_super()');
				$resourcesSup= array();
				$categories= array();
				$usersSup= array();
				$totalRes = array();
				$totalsCat = array();
				$totalsUse= array();
				$months = array(
					"Enero", 
					"Febrero", 
					"Marzo", 
					"Abril", 
					"Mayo", 
					"Junio", 
					"Julio",
					"Agosto",
					"Septiembre",
					"Octubre",
					"Noviembre",
					"Diciembre"
				);

				$totalMonths = array(					
					1=>0,
					2=>0,
					3=>0,
					4=>0,
					5=>0,
					6=>0,
					7=>0,
					8=>0,
					9=>0,
					10=>0,
					11=>0,
					12=>0,
				);

				$totalDays = array(
										
					1=>0,
					2=>0,
					3=>0,
					4=>0,
					5=>0,
					6=>0,
				);

				//Users	
				foreach($totalUseSup as $tus){
					$user_name = $tus->school_id;
					$user_count = $tus->total;
					$usersSup = array_add($usersSup,$count,$user_name);
					$totalsUse = array_add($totalsUse,$count,$user_count);
					$count++;	
				}

				//Resources
				$count=0;
				foreach($totalRec as $tr){
					$resource_name = $tr->name;
					$resource_count = $tr->total;
					$resourcesSup = array_add($resourcesSup,$count,$resource_name);
					$totalRes = array_add($totalRes,$count,$resource_count);
					$count++;					
				}	

				

				//Categories	
				$count=0;			
				foreach($totalCat as $tc){
					$category_name = $tc->name;
					$category_count = $tc->total;
					$categories = array_add($categories,$count,$category_name);
					$totalsCat = array_add($totalsCat,$count,$category_count);
					$count++;					
				}			

				//month
				foreach($totalMonth as $tm){
					$num_month = $tm->month;
					$month_count = $tm->total;
					$totalMonths[$num_month]=$month_count;				
				}			

				// daily
				foreach($totalDay as $td){
					$num_day = $td->day;
					$day_count = $td->total;
					$totalDays[$num_day-1]=$day_count;						
				}															

				return View::make('admin.index')
				->with(['resourceSuper'=>$resourcesSup])
				->with(['totalSuper' => $totalRes])
				->with(['category' => $categories])
				->with(['totalCat' => $totalsCat])	
				->with(['userSuper' => $usersSup])
				->with(['totalUser' => $totalsUse])
				->with(['monthSuper' => $months])
				->with(['totalmonthSup' => $totalMonths])
				->with(['totalDay' => $totalDays]);
			}
			
			$lab_id = Session::get('lab_id');
			//$total = DB::select('call ResourceTotal(' . $lab_id . ')');
			$total = DB::select('CALL ResourceTotal(?)',array($lab_id));
			$totalUser = DB::select('CALL UserTotal(?)',array($lab_id));
			$totalMonth = DB::select('CALL MonthTotal(?)',array($lab_id));
			$totalWeek = DB::select('CALL WeekTotal(?)',array($lab_id));
			$resources= array();
			$totals = array();
			$users = array();
			$totalUsers = array();
			$months = array(

				"Enero", 
				"Febrero", 
				"Marzo", 
				"Abril", 
				"Mayo", 
				"Junio", 
				"Julio",
				"Agosto",
				"Septiembre",
				"Octubre",
				"Noviembre",
				"Diciembre"



			);
			$totalMonths = array(
				
				1=>0,
				2=>0,
				3=>0,
				4=>0,
				5=>0,
				6=>0,
				7=>0,
				8=>0,
				9=>0,
				10=>0,
				11=>0,
				12=>0,

			);
			$totalDays = array(
				
				1=>0,
				2=>0,
				3=>0,
				4=>0,
				5=>0,
				6=>0,
				

			);
			
			// RESOURCE
			foreach($total as $t){

				$resource_name = $t->name;
				$resource_count = $t->total;
				$resources = array_add($resources,$count,$resource_name);
				$totals = array_add($totals,$count,$resource_count);
				$count++;
			}
			// USER
			$count=0;
			foreach($totalUser as $tu){

				$user_name = $tu->user_id;
				$user_count = $tu->total;
				$users = array_add($users,$count,$user_name);
				$totalUsers = array_add($totalUsers,$count,$user_count);
				$count++;
			}
			// MONTHLY
			foreach($totalMonth as $tm){

				$monthss = $tm->month;
				$monthCount = $tm->total;
				$totalMonths[$monthss]=$monthCount;	
				
			}
			// var_dump($totalMonths);

			// DAILY
			foreach($totalWeek as $tw){

				$days = $tw->day;
				$dayCount = $tw->total;
				$totalDays[$days-1]=$dayCount;	
				
			}
			 //var_dump($totalDays);

			return View::make('admin.index')
				->with(['resource'=>$resources])
				->with(['total'=>$totals])
				->with(['userName'=>$users])
				->with(['userCount' => $totalUsers])
				->with(['month' => $months])
				->with(['monthCount' => $totalMonths])
				->with(['dayCount' => $totalDays]);

			
		}else{
			return Redirect::to('login');
		}
	}

	public function showUsers()
	{
		return View::make('admin.users');
	}

	public function showLaboratories()
	{
		return View::make('admin.laboratories');
	}

	public function showCategories()
	{
		return View::make('admin.categories');
	}

	public function showResources()
	{
		return View::make('admin.resources');
	}

	public function showTimetables()
	{
		return View::make('admin.timetables');
	}

	public function showSchedules()
	{
		return View::make('admin.schedules');
	}

	public function showBookings()
	{
		return View::make('admin.bookings');
	}

	public function showWaitingLists()
	{
		return View::make('admin.waitinglists');
	}

}
