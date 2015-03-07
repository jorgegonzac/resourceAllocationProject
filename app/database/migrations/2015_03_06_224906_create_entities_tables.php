<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntitiesTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::create('careers', function($t) {
			$t->increments('id');
			$t->string('name'); 
			$t->timestamps();
		});
		Schema::create('laboratories', function($t){
			$t->increments('id');
			$t->string('name',150);
			$t->integer('building');
			$t->timestamps();
		});
		Schema::create('categories', function($t){
			$t->increments('id');
			$t->string('name',70);
			$t->string('description',150)->nullable();
			$t->timestamps();
		});
		Schema::create('resources', function($t){
			$t->increments('id');
			$t->string('name',50);
			$t->string('description',150)->nullable();
			$t->string('image');
			$t->integer('category_id')->references('id')->on('category');
			$t->integer('laboratory_id')->references('id')->on('laboratory');
			$t->timestamps();
		});
		Schema::create('timetables', function($t){
			$t->increments('id');
			$t->string('description',150);
			$t->timestamps();
		});
		Schema::create('schedules', function($t){
			$t->increments('id');
			$t->integer('day');
			$t->integer('period');
			$t->time('start_hour');
			$t->time('end_hour');
			$t->timestamps();
		});
		Schema::create('users', function($t){
			$t->increments('id');
			$t->string('first_name',50);
			$t->string('last_name',50);
			$t->string('email',50);	
			$t->string('school_id',9);
			$t->timestamps();
		});
		Schema::create('waitinglists', function($t){
			$t->increments('id');
			$t->timestamp('start_date');
			$t->timestamp('end_date');
			$t->integer('resource_id')->references('id')->on('resource');
			$t->integer('user_id')->references('id')->on('user');
			$t->timestamps();
		});
		Schema::create('bookings', function($t){
			$t->increments('id');
			$t->integer('resource_id')->references('id')->on('resource');
			$t->integer('user_id')->references('id')->on('user');				
			$t->timestamp('start_date');
			$t->timestamp('end_date');
			$t->timestamp('return_date');
			$t->timestamps();
		});
		Schema::create('roles', function($t){
			$t->increments('id');
			$t->string('name',50);
			$t->timestamps();
		});
		Schema::create('privilages', function($t){
			$t->increments('id');
			$t->string('name',50);
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
		Schema::drop('careers');
		Schema::drop('laboratories');
		Schema::drop('resources');
		Schema::drop('categories');
		Schema::drop('timetables');
		Schema::drop('schedules');
		Schema::drop('users');
		Schema::drop('waitinglists');
		Schema::drop('bookings');
		Schema::drop('roles');
		Schema::drop('privilages');		
	}

}
