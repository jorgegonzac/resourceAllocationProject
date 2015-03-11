<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTagsColumnCareeridColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		//
		Schema::table('resources', function($table)
		{
		    $table->string('tags');
		});
		Schema::table('users', function($table)
		{
		    $table->integer('career_id');
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
		Schema::table('resources', function($table)
		{
		    $table->dropColumn('tags');
		});
		Schema::table('users', function($table)
		{
		    $table->dropColumn('career_id');
		});
	}

}
