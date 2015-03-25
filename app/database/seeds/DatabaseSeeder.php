<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();
		$this->call('resourceAllocationSeeder');
		$this->command->info('Resource Allocation Seeds Finished');
		// $this->call('UserTableSeeder');
	}

}

class resourceAllocationSeeder extends Seeder{

	public function run(){

		//Clear our DATABASE
		DB::table('bookings')->delete();//
		DB::table('careers')->delete(); //
		DB::table('categories')->delete(); //
		DB::table('laboratories')->delete(); //
		DB::table('privilages')->delete(); //
		DB::table('resources')->delete();//
		DB::table('roles')->delete(); //
		DB::table('schedules')->delete(); //
		DB::table('timetables')->delete(); //
		DB::table('users')->delete(); //
		DB::table('waitinglists')->delete();//
		DB::table('careers_laboratories')->delete();//
		DB::table('roles_privilages')->delete();//
		DB::table('timetables_resources')->delete();//
		DB::table('timetables_schedules')->delete();//
		DB::table('users_roles')->delete();//

		$career_1 = Career::create(array(
			'name'	=> 'ISC'
		));
		$career_2 = Career::create(array(
			'name'	=> 'IBT'
		));
		$career_3 = Career::create(array(
			'name'	=> 'LMCD'
		));
		$career_4 = Career::create(array(
			'name'	=> 'LIN'
		));
		$career_5 = Career::create(array(
			'name'	=> 'LAD'
		));

		$this->command->info('Careers created');
		
		$lab_1 = Laboratory::create(array(
			'name'	=>	'Centro de Medios',
			'building' => 1
		));

		$lab_2 = Laboratory::create(array(
			'name'	=>	'DICI',
			'building' => 2
		));

		$lab_3 = Laboratory::create(array(
			'name'	=>	'Electrónica ',
			'building' => 3
		));

		$lab_4 = Laboratory::create(array(
			'name'	=>	'Sistemas Industriales',
			'building' => 4
		));

		$lab_5 = Laboratory::create(array(
			'name'	=>	'Centro Deportivo',
			'building' => 5
		));

		$this->command->info('Labs created');
		
		$career_1->laboratories()->attach($lab_1->id);
		$career_2->laboratories()->attach($lab_2->id);
		$career_3->laboratories()->attach($lab_3->id);
		$career_4->laboratories()->attach($lab_4->id);
		$career_5->laboratories()->attach($lab_5->id);

		$career_1->laboratories()->attach($lab_2->id);
		$career_2->laboratories()->attach($lab_3->id);
		$career_3->laboratories()->attach($lab_4->id);
		$career_4->laboratories()->attach($lab_5->id);
		$career_5->laboratories()->attach($lab_1->id);

		$career_1->laboratories()->attach($lab_5->id);
		$career_2->laboratories()->attach($lab_4->id);
		$career_3->laboratories()->attach($lab_1->id);
		$career_4->laboratories()->attach($lab_2->id);
		$career_5->laboratories()->attach($lab_3->id);

		$this->command->info('Labs linked to labs');

		$category_1 = Category::create(array(
			'name'	=>	'Aparatos eléctricos',
			'description'	=>	'Descripcion_1'
		));
		$category_2 = Category::create(array(
			'name'	=>	'Aparatos Mecánicos',
			'description'	=>	'Descripcion_2'
		));
		$category_3 = Category::create(array(
			'name'	=>	'Aparatos Electrónicos',
			'description'	=>	'Descripcion_3'
		));
		$this->command->info('Categories created');
		

		$user_1 = User::create(array(
			'email1'		=>	'A01202341@itesm.mx',
			'school_id'		=>	'A01202341',
		));
		$user_2 = User::create(array(
			'email1'		=>	'A01202342@itesm.mx',
			'school_id'		=>	'A01212342',
		));
		$user_3 = User::create(array(
			'email1'		=>	'A01202343@itesm.mx',
			'school_id'		=>	'A01212343',
		));
		$user_4 = User::create(array(
			'email1'		=>	'A01202344@itesm.mx',
			'school_id'		=>	'A01212344',
		));
		$user_5 = User::create(array(
			'email1'		=>	'A01202743@itesm.mx',
			'school_id'		=>	'A01202743',
			'password'		=>	Hash::make('1994aecook'),
		));

		$this->command->info('Users created');
		
		$privilages_1 = Privilages::create(array(
			'name'	=>	'editar'
		));
		$privilages_2 = Privilages::create(array(
			'name'	=>	'reservar'
		));
		$privilages_3 = Privilages::create(array(
			'name'	=>	'eliminar'
		));
		$this->command->info('Privilages created');
		

		$role_1 = Role::create(array(
			'name'	=>	'administrador'
		));
		$role_2 = Role::create(array(
			'name'	=>	'estudiante'
		));
		$this->command->info('Roles created');
		

		$role_1->privilages()->attach($privilages_1->id);
		$role_1->privilages()->attach($privilages_2->id);
		$role_1->privilages()->attach($privilages_3->id);

		$role_2->privilages()->attach($privilages_2->id);
		$role_2->privilages()->attach($privilages_3->id);

		$user_1->roles()->attach($role_1->id);
		$user_1->roles()->attach($role_2->id);
		$user_2->roles()->attach($role_2->id);
		$user_3->roles()->attach($role_2->id);
		$user_4->roles()->attach($role_2->id);
		
		$this->command->info('Privilages assigned to roles');
		$this->command->info('roles assigned to users');


		$schedule_1 = Schedule::create(array(
			'day'	=>	'1',
			'period'	=>	'2',
			'start_hour'	=>	'09:00:00',
			'end_hour'	=>	'18:00:00'
		));
		$schedule_2 = Schedule::create(array(
			'day'	=>	'3',
			'period'	=>	'2',
			'start_hour'	=>	'09:00:00',
			'end_hour'	=>	'18:00:00'
		));
		$schedule_3 = Schedule::create(array(
			'day'	=>	'1',
			'period'	=>	'3',
			'start_hour'	=>	'09:00:00',
			'end_hour'	=>	'10:00:00'
		));
		$schedule_4 = Schedule::create(array(
			'day'	=>	'4',
			'period'	=>	'1',
			'start_hour'	=>	'09:00:00',
			'end_hour'	=>	'10:00:00'
		));
		$this->command->info('Schedules created');

		$timetable_1 = Timetable::create(array(
			'description'	=>  'dia laboral'
		));
		$timetable_2 = Timetable::create(array(
			'description'	=>  'medio dia laboral'
		));
		
		$this->command->info('timetables created');

		$timetable_1->schedules()->attach($schedule_1->id);
		$timetable_1->schedules()->attach($schedule_2->id);

		$timetable_2->schedules()->attach($schedule_3->id);
		$timetable_2->schedules()->attach($schedule_4->id);

		$this->command->info('schedules assigned to timetables');

		$resource_1 = Resource::create(array(
			'name'	=>	'taladro',
			'description' 	=>	'hace hoyos',
			'image'		=>	'/images/taladro.jpg',
			'category_id'	=>	$category_1->id,
			'laboratory_id'	=>	$lab_1->id,
			'tags'			=>	'madera%metal%electrico%corte'
		));
		$resource_2 = Resource::create(array(
			'name'	=>	'taladro de madera ',
			'description' 	=>	'hace hoyos 2',
			'image'		=>	'/images/taladro2.jpg',
			'category_id'	=>	$category_1->id,
			'laboratory_id'	=>	$lab_2->id,
			'tags'			=>	'madera%metal%electrico%corte'
		));

		$resource_3 = Resource::create(array(
			'name'	=>	'Martillo electrico',
			'description' 	=>	'para clavar',
			'image'		=>	'/images/martillo.jpg',
			'category_id'	=>	$category_2->id,
			'laboratory_id'	=>	$lab_3->id,
			'tags'			=>	'grande%blanca%fierro%metal'
		));
		$resource_4 = Resource::create(array(
			'name'	=>	'Rotomartillo electrico',
			'description' 	=>	'para clavar clavitos',
			'image'		=>	'/images/martilloroto.jpg',
			'category_id'	=>	$category_2->id,
			'laboratory_id'	=>	$lab_4->id,
			'tags'			=>	'electronico%electrico%laser'
		));

		$resource_5 = Resource::create(array(
			'name'	=>	'Martillo electrico de fierro',
			'description' 	=>	'para clavar',
			'image'		=>	'/images/martillo2.jpg',
			'category_id'	=>	$category_3->id,
			'laboratory_id'	=>	$lab_5->id,
			'tags'			=>	'sierra%corte%madera'
		));
		$resource_6 = Resource::create(array(
			'name'	=>	'Serrucho',
			'description' 	=>	'el serrucho hace rin rin',
			'image'		=>	'/images/serrucho.jpg',
			'category_id'	=>	$category_3->id,
			'laboratory_id'	=>	$lab_5->id,
			'tags'			=>	'madera%metal%electrico%corte'
		));
		$this->command->info('Resources created');
		
		$resource_1->timetables()->attach($timetable_1->id);
		$resource_2->timetables()->attach($timetable_1->id);
		$resource_3->timetables()->attach($timetable_1->id);
		$resource_4->timetables()->attach($timetable_2->id);
		$resource_5->timetables()->attach($timetable_2->id);
		$resource_6->timetables()->attach($timetable_2->id);

		$this->command->info('timetables assigned to resources');

		$waitingList_1 = Waitinglist::create(array(
			'start_date'	=>	'2015-03-06 14:00:00',
			'end_date'	=>	'2015-03-06 18:00:00',
			'resource_id' => $resource_1->id,
			'user_id'	=>	$user_1->id
		));
		$waitingList_2 = Waitinglist::create(array(
			'start_date'	=>	'2015-03-01 10:00:00',
			'end_date'	=>	'2015-03-01 18:00:00',
			'resource_id' => $resource_3->id,
			'user_id'	=>	$user_1->id
		));

		$waitingList_3 = Waitinglist::create(array(
			'start_date'	=>	'2015-03-06 14:00:00',
			'end_date'	=>	'2015-03-06 18:00:00',
			'resource_id' => $resource_2->id,
			'user_id'	=>	$user_2->id
		));
		$waitingList_4 = Waitinglist::create(array(
			'start_date'	=>	'2015-03-02 14:00:00',
			'end_date'	=>	'2015-03-02 18:00:00',
			'resource_id' => $resource_4->id,
			'user_id'	=>	$user_2->id
		));
		$waitingList_5 = Waitinglist::create(array(
			'start_date'	=>	'2015-03-01 14:00:00',
			'end_date'	=>	'2015-03-01 18:00:00',
			'resource_id' => $resource_5->id,
			'user_id'	=>	$user_3->id
		));
		$waitingList_6 = Waitinglist::create(array(
			'start_date'	=>	'2015-03-04 14:00:00',
			'end_date'	=>	'2015-03-04 18:00:00',
			'resource_id' => $resource_6->id,
			'user_id'	=>	$user_3->id
		));
		$waitingList_7 = Waitinglist::create(array(
			'start_date'	=>	'2015-03-01 14:00:00',
			'end_date'	=>	'2015-03-01 18:00:00',
			'resource_id' => $resource_5->id,
			'user_id'	=>	$user_3->id
		));
		$waitingList_8 = Waitinglist::create(array(
			'start_date'	=>	'2015-03-04 14:00:00',
			'end_date'	=>	'2015-03-04 18:00:00',
			'resource_id' => $resource_1->id,
			'user_id'	=>	$user_4->id
		));
		$waitingList_9 = Waitinglist::create(array(
			'start_date'	=>	'2015-03-01 14:00:00',
			'end_date'	=>	'2015-03-01 18:00:00',
			'resource_id' => $resource_3->id,
			'user_id'	=>	$user_4->id
		));

		$waitingList_10 = Waitinglist::create(array(
			'start_date'	=>	'2015-03-06 14:00:00',
			'end_date'	=>	'2015-03-06 18:00:00',
			'resource_id' => $resource_2->id,
			'user_id'	=>	$user_1->id
		));
		$waitingList_11 = Waitinglist::create(array(
			'start_date'	=>	'2015-03-02 14:00:00',
			'end_date'	=>	'2015-03-02 18:00:00',
			'resource_id' => $resource_5->id,
			'user_id'	=>	$user_2->id
		));

		$this->command->info('waitinglists created');

		//----------
		$booking_1 = Booking::create(array(
			'start_date'	=>	'2015-03-06 14:00:00',
			'end_date'	=>	'2015-03-06 18:00:00',
			'resource_id' => $resource_1->id,
			'user_id'	=>	$user_1->id
		));
		$booking_2 = Booking::create(array(
			'start_date'	=>	'2015-03-01 10:00:00',
			'end_date'	=>	'2015-03-01 18:00:00',
			'resource_id' => $resource_3->id,
			'user_id'	=>	$user_1->id
		));

		$booking_3 = Booking::create(array(
			'start_date'	=>	'2015-03-06 14:00:00',
			'end_date'	=>	'2015-03-06 18:00:00',
			'resource_id' => $resource_2->id,
			'user_id'	=>	$user_2->id
		));
		$booking_4 = Booking::create(array(
			'start_date'	=>	'2015-03-02 14:00:00',
			'end_date'	=>	'2015-03-02 18:00:00',
			'resource_id' => $resource_4->id,
			'user_id'	=>	$user_2->id
		));
		$booking_5 = Booking::create(array(
			'start_date'	=>	'2015-03-01 14:00:00',
			'end_date'	=>	'2015-03-01 18:00:00',
			'resource_id' => $resource_5->id,
			'user_id'	=>	$user_3->id
		));
		$booking_6 = Booking::create(array(
			'start_date'	=>	'2015-03-04 14:00:00',
			'end_date'	=>	'2015-03-04 18:00:00',
			'resource_id' => $resource_6->id,
			'user_id'	=>	$user_3->id
		));
		$booking_7 = Booking::create(array(
			'start_date'	=>	'2015-03-01 14:00:00',
			'end_date'	=>	'2015-03-01 18:00:00',
			'resource_id' => $resource_5->id,
			'user_id'	=>	$user_3->id
		));
		$booking_8 = Booking::create(array(
			'start_date'	=>	'2015-03-04 14:00:00',
			'end_date'	=>	'2015-03-04 18:00:00',
			'resource_id' => $resource_1->id,
			'user_id'	=>	$user_4->id
		));
		$this->command->info('bookings created');
		
	}

}