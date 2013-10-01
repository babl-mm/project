<?php

class SentryGroupSeederTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('sentrygroupseeder')->truncate();


			Sentry::getGroupProvider()->create(array(
		        'name'        => 'Users',
		        'permissions' => array(
		            'admin' => 0,
		            'users' => 1,
		        )));

			Sentry::getGroupProvider()->create(array(
		        'name'        => 'Admins',
		        'permissions' => array(
		            'admin' => 1,
		            'users' => 1,
		        )));

		// Uncomment the below to run the seeder
		// DB::table('sentrygroupseeder')->insert($sentrygroupseeder);
	}

}
