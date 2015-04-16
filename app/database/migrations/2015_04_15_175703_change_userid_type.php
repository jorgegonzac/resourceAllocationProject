<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeUseridType extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//Change the type of the user_id column for tables waitinglist and booking
		//change this syntaxis if the DB schema changes
		DB::statement('ALTER TABLE bookings MODIFY COLUMN user_id varchar(9)');
		DB::statement('ALTER TABLE waitinglists MODIFY COLUMN user_id varchar(9)');

	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		//
		DB::statement('ALTER TABLE bookings MODIFY COLUMN user_id int(11)');
		DB::statement('ALTER TABLE waitinglists MODIFY COLUMN user_id int(11)');

	}

}
