<?php

class SentryUserGroupSeederTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		// DB::table('sentryusergroupseeder')->truncate();
		// DB::table('sentryusergroupseeder')->truncate();
		


		$userUser  = Sentry::getUserProvider()->findByLogin('user@gmail.com');
		$adminUser = Sentry::getUserProvider()->findByLogin('admin@gmail.com');

		$userGroup  = Sentry::getGroupProvider()->findByName('Users');
		$adminGroup = Sentry::getGroupProvider()->findByName('Admins');

	    // Assign the groups to the users
	    $userUser->addGroup($userGroup);
	    $adminUser->addGroup($userGroup);
	    $adminUser->addGroup($adminGroup);

		// Uncomment the below to run the seeder
		// DB::table('sentryusergroupseeder')->insert($sentryusergroupseeder);
	}

}
