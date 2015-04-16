<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUseridIntoLaboratory extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('laboratories', function($table)
		{
		    $table->integer('user_id')->references('id')->on('user');							
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
		Schema::table('laboratories', function($table)
		{
		    $table->dropColumn('user_id');
		});
	}

}
