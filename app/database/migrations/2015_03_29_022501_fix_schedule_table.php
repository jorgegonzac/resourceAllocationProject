<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('schedules', function($table)
		{
			$table->dropColumn('day');
			$table->dropColumn('period');
		    $table->string('name')->unique();
		    $table->string('weekday');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('schedules', function($table)
		{
			$table->integer('day');
			$table->integer('period');
		    $table->dropColumn('name');
		    $table->dropColumn('weekday');
		});
	}

}
