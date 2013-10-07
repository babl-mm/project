<?php

use Illuminate\Database\Migrations\Migration;

class SentryAddColumn extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('users', function($table) {
			 $table->string('phoneno');
			 $table->date('dob');
			 $table->string('address');
			 $table->string('gender','6');
			 $table->string('city');
			 $table->string('postalcode');
			 $table->string('imageurl');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('users', function($table)
		{
		   	$table->dropColumn('phoneno', 'dob', 'address','gender','city', 'postalcode','imageurl');
		});
	
		
	}

}