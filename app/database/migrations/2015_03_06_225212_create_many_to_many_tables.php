<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManyToManyTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('timetables_resources', function($t){
			$t->increments('id');
			$t->integer('resource_id')->references('id')->on('resource');				
			$t->integer('timetable_id')->references('id')->on('timetable');								
			$t->timestamps();
		});	
		Schema::create('timetables_schedules', function($t){
			$t->increments('id');
			$t->integer('timetable_id')->references('id')->on('timetable');				
			$t->integer('schedule_id')->references('id')->on('schedule');								
			$t->timestamps();
		});
		Schema::create('users_roles', function($t){
			$t->increments('id');
			$t->integer('user_id')->references('id')->on('user');				
			$t->integer('role_id')->references('id')->on('role');								
			$t->timestamps();
		});	
		Schema::create('roles_privilages', function($t){
			$t->increments('id');
			$t->integer('role_id')->references('id')->on('role');				
			$t->integer('privilages_id')->references('id')->on('privilages');								
			$t->timestamps();
		});
		Schema::create('careers_laboratories', function($t){
			$t->increments('id');
			$t->integer('career_id')->references('id')->on('career');				
			$t->integer('laboratory_id')->references('id')->on('laboratory');				
			$t->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//		
		Schema::drop('timetables_resources');
		Schema::drop('timetables_schedules');
		Schema::drop('users_roles');
		Schema::drop('roles_privilages');
		Schema::drop('careers_laboratories');
	}

}
