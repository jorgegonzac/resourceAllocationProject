<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSoftDelete extends Migration {

	public function up()
	{
		Schema::table('users', function($table)
		{
		    $table->softDeletes();
		});

		Schema::table('bookings', function($table)
		{
		    $table->softDeletes();
		});

		Schema::table('careers', function($table)
		{
		    $table->softDeletes();
		});

		Schema::table('categories', function($table)
		{
		    $table->softDeletes();
		});

		Schema::table('laboratories', function($table)
		{
		    $table->softDeletes();
		});

		Schema::table('privilages', function($table)
		{
		    $table->softDeletes();
		});

		Schema::table('resources', function($table)
		{
		    $table->softDeletes();
		});

		Schema::table('roles', function($table)
		{
		    $table->softDeletes();
		});

		Schema::table('schedules', function($table)
		{
		    $table->softDeletes();
		});

		Schema::table('timetables', function($table)
		{
		    $table->softDeletes();
		});

		Schema::table('waitinglists', function($table)
		{
		    $table->softDeletes();
		});
	}

	public function down()
	{
		Schema::table('users', function($table)
		{
		    $table->dropColumn('deleted_at');
		});

		Schema::table('bookings', function($table)
		{
		    $table->dropColumn('deleted_at');
		});

		Schema::table('careers', function($table)
		{
		    $table->dropColumn('deleted_at');
		});

		Schema::table('categories', function($table)
		{
		    $table->dropColumn('deleted_at');
		});

		Schema::table('laboratories', function($table)
		{
		    $table->dropColumn('deleted_at');
		});

		Schema::table('privilages', function($table)
		{
		    $table->dropColumn('deleted_at');
		});

		Schema::table('resources', function($table)
		{
		    $table->dropColumn('deleted_at');
		});

		Schema::table('roles', function($table)
		{
		    $table->dropColumn('deleted_at');
		});

		Schema::table('schedules', function($table)
		{
		    $table->dropColumn('deleted_at');
		});

		Schema::table('timetables', function($table)
		{
		    $table->dropColumn('deleted_at');
		});

		Schema::table('waitinglists', function($table)
		{
		    $table->dropColumn('deleted_at');
		});
	}

}
